<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PengaduanController extends BaseController
{
    public function pengaduanData()
    {
        $data = [
            'title' => 'Basic Table',
            'subTitle' => 'Basic Table',
        ];
        return view('table/tableData', $data);
    }
}
