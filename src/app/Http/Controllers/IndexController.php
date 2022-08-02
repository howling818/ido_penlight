<?php

namespace App\Http\Controllers;

use App\Models\IdolGroup;
use Illuminate\Support\Facades\Log;

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
