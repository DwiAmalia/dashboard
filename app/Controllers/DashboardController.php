<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{

    public function index()
    {
        // log_message('debug', 'Session Data: ' . print_r(session()->get(), true));
        // Access session data from the session property
        $nama_pegawai = $this->session->get('user')['nama_pegawai'] ?? 'Guest';
        $level = $this->session->get('user')['level'] ?? 'Unknown';
        $id_pegawai = $this->session->get('user')['id_pegawai'] ?? 'Unknown';
        $nip_pegawai = $this->session->get('user')['nip_pegawai'] ?? 'Unknown';
        $url_foto_pegawai = $this->session->get('user')['url_foto_pegawai'] ?? 'Unknown';
        $id_opd = $this->session->get('user')['id_opd'] ?? 'Unknown';
        $nama_opd = $this->session->get('user')['nama_opd'] ?? 'Unknown';
        $id_atasan = $this->session->get('user')['id_atasan'] ?? 'Unknown';

        $data = [
            'title' => 'Dashboard',
            'subTitle' => $nama_pegawai,
            'nama_pegawai' => $nama_pegawai,
            'level' => $level,
            'id_pegawai' => $id_pegawai,
            'nip_pegawai' => $nip_pegawai,
            'url_foto_pegawai' => $url_foto_pegawai,
            'id_opd' => $id_opd,
            'nama_opd' => $nama_opd,
            'id_atasan' => $id_atasan,
        ];
        return view('dashboard/index', $data);
    }

    public function index2(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'CRM',
        ];
        return view('dashboard/index2', $data);
    }

    public function index3(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'eCommerce',
        ];
        return view('dashboard/index3', $data);
    }

    public function index4(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'Cryptocracy',
        ];
        return view('dashboard/index4', $data);
    }

    public function index5(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'Investment',
        ];
        return view('dashboard/index5', $data);
    }

    public function index6(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'LMS / Learning System',
        ];
        return view('dashboard/index6', $data);
    }

    public function index7(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'NFT & Gaming',
        ];
        return view('dashboard/index7', $data);
    }

    public function index8(): string
    {
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'Medical',
        ];
        return view('dashboard/index8', $data);
    }

    public function index9(): string
    {
        $data = [
            'title' => 'Analytics',
            'subTitle' => 'Analytics',
        ];
        return view('dashboard/index9', $data);
    }

    public function index10(): string
    {
        $data = [
            'title' => 'POS & Inventory',
            'subTitle' => 'POS & Inventory',
        ];
        return view('dashboard/index10', $data);
    }
}
