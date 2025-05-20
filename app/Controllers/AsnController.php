<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AsnController extends BaseController
{
    public function asnData()
    {
        $data = [
            'title' => 'Basic Table',
            'subTitle' => 'Basic Table',
        ];
        return view('table/tableData', $data);
    }
}
