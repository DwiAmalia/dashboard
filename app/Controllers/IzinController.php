<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IzinController extends BaseController
{
    public function izinData()
    {
        $data = [
            'title' => 'Basic Table',
            'subTitle' => 'Basic Table',
        ];
        return view('table/tableData', $data);
    }
}
