<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LapkinController extends BaseController
{
    public function lapkinData()
    {
        $data = [
            'title' => 'Basic Table',
            'subTitle' => 'Basic Table',
        ];
        return view('table/tableData', $data);
    }
}
