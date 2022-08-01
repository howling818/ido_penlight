<?php

namespace App\Http\Controllers;

use App\Models\IdolGroup;

class IndexController extends Controller
{

    public function index()
    {
        $idolGroupModels = new IdolGroup();

        $idolGroupLists = $idolGroupModels->getList();

        return view(
            'index',
            [
                'pageName'          => '',
                'pageFlg'           => 'Index',
                'idolGroupLists'    => $idolGroupLists
            ]
        );
    }
}
