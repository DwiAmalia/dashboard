<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SseController extends BaseController
{
    public function sseData()
    {
        $nama_pegawai = $this->session->get('user')['nama_pegawai'] ?? 'Guest';
        $level = $this->session->get('user')['level'] ?? 'Unknown';
        $id_pegawai = $this->session->get('user')['id_pegawai'] ?? 'Unknown';
        $nip_pegawai = $this->session->get('user')['nip_pegawai'] ?? 'Unknown';
        $url_foto_pegawai = $this->session->get('user')['url_foto_pegawai'] ?? 'Unknown';
        $id_opd = $this->session->get('user')['id_opd'] ?? 'Unknown';
        $nama_opd = $this->session->get('user')['nama_opd'] ?? 'Unknown';
        $id_atasan = $this->session->get('user')['id_atasan'] ?? 'Unknown';

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
        ];
        return view('sse/sseData', $data);
    }
}
