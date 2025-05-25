<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\CURLRequest;

class PendudukController extends BaseController
{
    public function index()
    {
        if (!session()->get('token')) {
            return redirect()->to(route_to('signin'))->with('error', 'Please log in first.');
        }

        log_message('info', 'Fetching all penduduk records');

        $client = \Config\Services::curlrequest();
        try {
            $response = $client->request('GET', getenv('API_URL') . '/penduduk', [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token'),
                    'Accept' => 'application/json'
                ],
                'http_errors' => false,
                'timeout' => 5
            ]);

            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                return view('penduduk/index', ['data' => $data]);
            } else {
                return redirect()->to(route_to('penduduk'))->with('error', 'Failed to fetch penduduk data');
            }
        } catch (\Exception $e) {
            return redirect()->to(route_to('penduduk'))->with('error', 'API service unavailable: ' . $e->getMessage());
        }
    }

    // Get a specific Penduduk by NIK
    public function show($nik)
    {
        log_message('info', "Fetching penduduk with NIK: $nik");

        $client = \Config\Services::curlrequest();
        try {
            $response = $client->request('GET', getenv('API_URL') . '/penduduk/' . $nik, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token'),
                    'Accept' => 'application/json'
                ],
                'http_errors' => false,
                'timeout' => 5
            ]);

            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200 && isset($data['data'])) {
                return view('penduduk/show', ['data' => $data['data']]);
            } else {
                return redirect()->to(route_to('penduduk'))->with('error', 'Penduduk not found');
            }
        } catch (\Exception $e) {
            return redirect()->to(route_to('penduduk'))->with('error', 'API service unavailable: ' . $e->getMessage());
        }
    }

    // Add a new Penduduk
    public function create()
    {
        log_message('info', 'Rendering add new penduduk form');

        return view('penduduk/create');
    }

    public function store()
    {
        if ($this->request->getMethod() == 'POST') {
            log_message('info', 'Creating new penduduk record');

            $client = \Config\Services::curlrequest();
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'status_perkawinan' => $this->request->getPost('status_perkawinan'),
                'agama' => $this->request->getPost('agama'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'rt' => $this->request->getPost('rt'),
                'rw' => $this->request->getPost('rw'),
                'kelurahan_id' => $this->request->getPost('kelurahan_id'),
                'kecamatan_id' => $this->request->getPost('kecamatan_id'),
                'kabupaten_id' => $this->request->getPost('kabupaten_id'),
                'provinsi_id' => $this->request->getPost('provinsi_id')
            ];

            try {
                $response = $client->request('POST', getenv('API_URL') . '/penduduk', [
                    'form_params' => $data,
                    'headers' => [
                        'Authorization' => 'Bearer ' . session()->get('token'),
                        'Accept' => 'application/json'
                    ],
                    'http_errors' => false,
                    'timeout' => 5
                ]);

                $statusCode = $response->getStatusCode();
                $data = json_decode($response->getBody(), true);

                if ($statusCode == 201) {
                    return redirect()->to(route_to('penduduk'))->with('success', 'Penduduk created successfully');
                } else {
                    return redirect()->to(route_to('penduduk'))->with('error', 'Failed to create penduduk');
                }
            } catch (\Exception $e) {
                return redirect()->to(route_to('penduduk'))->with('error', 'API service unavailable: ' . $e->getMessage());
            }
        }
    }

    // Edit an existing Penduduk
    public function edit($nik)
    {
        log_message('info', "Rendering edit form for penduduk with NIK: $nik");

        // Fetch the existing Penduduk data by NIK
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->request('GET', getenv('API_URL') . '/penduduk/' . $nik, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token'),
                    'Accept' => 'application/json'
                ],
                'http_errors' => false,
                'timeout' => 5
            ]);

            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200 && isset($data['data'])) {
                return view('penduduk/edit', ['data' => $data['data']]);
            } else {
                return redirect()->to(route_to('penduduk'))->with('error', 'Penduduk not found');
            }
        } catch (\Exception $e) {
            return redirect()->to(route_to('penduduk'))->with('error', 'API service unavailable: ' . $e->getMessage());
        }
    }

    // Update Penduduk
    public function update($nik)
    {
        if ($this->request->getMethod() == 'POST') {
            log_message('info', "Updating penduduk with NIK: $nik");

            $client = \Config\Services::curlrequest();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'status_perkawinan' => $this->request->getPost('status_perkawinan'),
                'agama' => $this->request->getPost('agama'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'rt' => $this->request->getPost('rt'),
                'rw' => $this->request->getPost('rw'),
                'kelurahan_id' => $this->request->getPost('kelurahan_id'),
                'kecamatan_id' => $this->request->getPost('kecamatan_id'),
                'kabupaten_id' => $this->request->getPost('kabupaten_id'),
                'provinsi_id' => $this->request->getPost('provinsi_id')
            ];

            try {
                $response = $client->request('PUT', getenv('API_URL') . '/penduduk/' . $nik, [
                    'form_params' => $data,
                    'headers' => [
                        'Authorization' => 'Bearer ' . session()->get('token'),
                        'Accept' => 'application/json'
                    ],
                    'http_errors' => false,
                    'timeout' => 5
                ]);

                $statusCode = $response->getStatusCode();
                $data = json_decode($response->getBody(), true);

                if ($statusCode == 200) {
                    return redirect()->to(route_to('penduduk'))->with('success', 'Penduduk updated successfully');
                } else {
                    return redirect()->to(route_to('penduduk'))->with('error', 'Failed to update penduduk');
                }
            } catch (\Exception $e) {
                return redirect()->to(route_to('penduduk'))->with('error', 'API service unavailable: ' . $e->getMessage());
            }
        }
    }

    // Delete Penduduk
    public function delete($nik)
    {
        log_message('info', "Deleting penduduk with NIK: $nik");

        $client = \Config\Services::curlrequest();
        try {
            $response = $client->request('DELETE', getenv('API_URL') . '/penduduk/' . $nik, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token'),
                    'Accept' => 'application/json'
                ],
                'http_errors' => false,
                'timeout' => 5
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 204) {
                return redirect()->to(route_to('penduduk'))->with('success', 'Penduduk deleted successfully');
            } else {
                return redirect()->to(route_to('penduduk'))->with('error', 'Failed to delete penduduk');
            }
        } catch (\Exception $e) {
            return redirect()->to(route_to('penduduk'))->with('error', 'API service unavailable: ' . $e->getMessage());
        }
    }
}
