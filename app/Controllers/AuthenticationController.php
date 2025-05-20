<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\CURLRequest;

class AuthenticationController extends BaseController
{


    public function signin()
    {
        return view('authentication/signin'); // Show the sign-in page
    }

    public function forgotPassword()
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'Sub Title',
        ];
        return view('authentication/forgotPassword', $data);
    }

    public function signinProcess()
    {
        log_message('info', 'Entered signinProcess method');
        log_message('info', 'POST data: ' . print_r($this->request->getPost(), true));
        if ($this->request->getMethod() == 'POST') {
            log_message('debug', 'POST request detected');
            // Get form data
            $nip_pegawai = $this->request->getPost('nip_pegawai');
            $password = $this->request->getPost('password');

            // Validate inputs
            if (empty($nip_pegawai) || empty($password)) {
                return redirect()->to(route_to('signin'))->with('error', 'NIP and password are required');
            }
            // log_message('debug', "Attempting login with NIP: $nip_pegawai");
            // Prepare the data for API request
            $client = \Config\Services::curlrequest();

            try {
                // log_message('debug', 'Attempting API call to http://localhost:3000/api/v1/login');
                $response = $client->request('POST', getenv('API_URL') . '/login', [
                    'form_params' => [
                        'nip_pegawai' => $nip_pegawai,
                        'password' => $password
                    ],
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Accept' => 'application/json'
                    ],
                    'http_errors' => false,
                    'timeout' => 5 // Add timeout
                ]);
                // log_message('debug', 'API call completed. Status: ' . $response->getStatusCode());
                // log_message('debug', 'API response: ' . $response->getBody());

                $statusCode = $response->getStatusCode();
                $data = json_decode($response->getBody(), true);

                if ($statusCode == 200 && isset($data['code']) && $data['code'] == 200) {
                    // session()->start();
                    // Clear any existing session
                    session()->remove(['token', 'user']);

                    // Set new session data
                    session()->set([
                        'token' => $data['data']['token'] ?? null,
                        'user' => $data['data'] ?? null
                    ]);

                    return redirect()->to(route_to('index'));
                } else {

                    $errorMsg = $data['message'] ?? 'Login failed with status code: ' . $statusCode;
                    return redirect()->to(route_to('signin'))->with('error', $errorMsg);
                }
            } catch (\Exception $e) {
                // log_message('error', 'API call failed: ' . $e->getMessage());
                return redirect()->to(route_to('signin'))->with('error', 'API service unavailable: ' . $e->getMessage());
            }
        } else {
            log_message('debug', 'GET request to signin page');
        }
        // Display the signin page
        $data = [
            'title' => 'Sign In',
            'subTitle' => 'Enter your credentials',
            'error' => session()->getFlashdata('error')
        ];

        return view('authentication/signin', $data);
    }

    public function signup()
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'Sub Title',
        ];
        return view('authentication/signup', $data);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(route_to('signin'));
    }
}
