<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PresensiController extends BaseController
{
    public function presensiData()
    {

        // Fetch session data (same as before)
        $nama_pegawai = $this->session->get('user')['nama_pegawai'] ?? 'Guest';
        $level = $this->session->get('user')['level'] ?? 'Unknown';
        $id_pegawai = $this->session->get('user')['id_pegawai'] ?? 'Unknown';
        $nip_pegawai = $this->session->get('user')['nip_pegawai'] ?? 'Unknown';
        $url_foto_pegawai = $this->session->get('user')['url_foto_pegawai'] ?? 'Unknown';
        $id_opd = $this->session->get('user')['id_opd'] ?? 'Unknown';
        $nama_opd = $this->session->get('user')['nama_opd'] ?? 'Unknown';
        $id_atasan = $this->session->get('user')['id_atasan'] ?? 'Unknown';

        // Get the filters from the request query
        $date = $this->request->getVar('date') ?? date('Y-m-d');
        $limit = $this->request->getVar('limit') ?? 10;
        $page = $this->request->getVar('page') ?? 1;
        $id_opd_filter = $this->request->getVar('id_opd') ?? null;
        $id_pegawai_filter = $this->request->getVar('id_pegawai') ?? null;
        $search = $this->request->getVar('search') ?? null;

        // Initialize the curl request client
        $client = \Config\Services::curlrequest();

        // Fetch OPD list
        $opdList = $this->fetchOpdList(); // Fetch OPD list for the filter options
        $pegawaiList = $this->getPegawaiList();

        // Calculate the offset for pagination
        $offset = ($page - 1) * $limit;

        // Build the query parameters for the API request
        $params = [
            'date' => $date,
            'limit' => $limit,
            'page' => $page,
            'id_opd' => $id_opd_filter,
            'id_pegawai' => $id_pegawai_filter,
            'search' => $search,
        ];

        try {
            // Make GET request to fetch data from the Express.js API
            $response = $client->request('GET', getenv('API_URL') . '/dashboard/presensi', [
                'query' => $params,
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ],
            ]);
            $dataPresensi = json_decode($response->getBody(), true);
            // log_message('debug', 'API response: ' . $response->getBody());
        } catch (\Exception $e) {
            // Log the error and show the error page if something goes wrong with the API request
            log_message('error', 'Error fetching attendance data: ' . $e->getMessage());
            return view('dashboard/index', [
                'title' => 'Dashboard',
                'error' => 'Error retrieving attendance data: ' . $e->getMessage()
            ]);
        }

        // Check if the data was successfully retrieved
        if (isset($dataPresensi['code']) && $dataPresensi['code'] === 200) {
            // Add row number logic here
            $startRowNumber = ($page - 1) * $limit + 1;

            // Prepare data for the view
            $data = [
                'title' => 'Presensi',
                'subTitle' => 'Presensi / ' . $nama_pegawai,
                'nama_pegawai' => $nama_pegawai,
                'level' => $level,
                'id_pegawai' => $id_pegawai,
                'nip_pegawai' => $nip_pegawai,
                'url_foto_pegawai' => $url_foto_pegawai,
                'id_opd' => $id_opd,
                'nama_opd' => $nama_opd,
                'id_atasan' => $id_atasan,
                'attendanceData' => $dataPresensi['data'],
                'totalPages' => $dataPresensi['totalPages'] ?? 1,
                'totalRecords' => $dataPresensi['totalRecords'] ?? 0,
                'totalLateness' => $dataPresensi['totalLateness'] ?? 0,
                'totalOntime' => $dataPresensi['totalOntime'] ?? 0,
                'filters' => [
                    'id_opd' => $id_opd_filter,
                    'id_pegawai' => $id_pegawai_filter,
                    'search' => $search,
                    'date' => $date,
                    'limit' => $limit,
                    'page' => $page,
                ],
                'opdList' => $opdList,
                'pegawaiList' => $pegawaiList,
                'startRowNumber' => $startRowNumber // Pass the start row number
            ];
            return view('presensi/presensiData', $data);
        } else {
            log_message('error', 'Failed to retrieve data: ' . $dataPresensi['message']);
            return view('dashboard/index', [
                'title' => 'Dashboard',
                'error' => 'Failed to retrieve attendance data'
            ]);
        }
    }


    private function fetchOpdList()
    {
        // Fetch OPD list from the database
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', getenv('API_URL') . '/dashboard/opd-list', [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ]
            ]);
            return json_decode($response->getBody(), true);
            log_message('debug', 'opd-list response: ' . $response->getBody());
        } catch (\Exception $e) {
            log_message('error', 'Error fetching OPD list: ' . $e->getMessage());
            return [];
        }
    }
    // Helper function to get list of Pegawai filtered by OPD
    private function getPegawaiList()
    {
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->request('GET', getenv('API_URL') . '/dashboard/pegawai-list', [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ]
            ]);
            return json_decode($response->getBody(), true);
            log_message('debug', 'opd-list response: ' . $response->getBody());
        } catch (\Exception $e) {
            log_message('error', 'Error fetching OPD list: ' . $e->getMessage());
            return [];
        }
    }
}
