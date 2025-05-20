<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Before method is called before the controller action.
     * 
     * @param RequestInterface $request
     * @param array|null $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the session has a 'token'
        if (!session()->has('token')) {
            // If no token, redirect to the login page
            return redirect()->to(route_to('signin'));
        }

        // Token exists, now validate it using the Express API's /validate-token route
        $client = \Config\Services::curlrequest();

        try {
            // Log the Authorization header being sent
            log_message('debug', 'Authorization Header: Bearer ' . session()->get('token'));

            // Make GET request to validate the token via the Express API's token validation middleware
            $response = $client->request('GET', getenv('API_URL') . '/validate-token', [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ]
            ]);

            // Log the response status code and body for debugging
            log_message('debug', 'API Response Status Code: ' . $response->getStatusCode());
            log_message('debug', 'API Response Body: ' . $response->getBody());

            // Parse the response
            $data = json_decode($response->getBody(), true);

            // Check if the token has expired (API returns 401 with message "Expired Token")
            if (isset($data['code']) && $data['code'] === 401 && $data['message'] === 'Expired Token') {
                // Token has expired, clear session and redirect to login
                session()->remove(['token', 'user']);
                return redirect()->to(route_to('signin'))->with('error', 'Your session has expired. Please log in again.');
            }
        } catch (\Exception $e) {
            // Log the error message if the API call fails
            log_message('error', 'Error verifying token: ' . $e->getMessage());
            return redirect()->to(route_to('signin'))->with('error', 'Error verifying token. Please log in again.');
        }

        // If the token is valid, allow the request to continue
        return null;
    }

    /**
     * After method is called after the controller action.
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array|null $arguments
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No need for after processing, so nothing here
    }
}
