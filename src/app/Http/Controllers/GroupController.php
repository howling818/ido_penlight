<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\IdolGroup;
use App\Models\Member;

class GroupController extends Controller
{
    private $idolGroupModels;
    private $idolGroupMemberModels;
    private $idolGroupLists;
    public function __construct()
    {
        $this->idolGroupModels = new IdolGroup();
        $this->idolGroupMemberModels = new Member();
        $this->idolGroupLists = $this->idolGroupModels->getList();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'group.index',
            [
                'pageName'          => 'グループ',
                'pageFlg'           => 'Groups',
                'idolGroupLists'    => $this->idolGroupLists
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'group.create',
            [
                'pageName'          => 'グループ追加',
                'pageFlg'           => 'Groups',
                'subPageFlg'        => 'GroupsAdd',
                'idolGroupLists'    => $this->idolGroupLists
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 登録処理
        $connection = DB::connection();
        $connection->beginTransaction();
        $registFlg = true;
        $idolGroupId = null;
        try {
            $idolGroupId = $this->idolGroupModels->insert($request);
            $connection->commit();
        } catch (Exception $e) {
            $connection->rollback();
            $registFlg = false;
        }

        $this->idolGroupLists = $this->idolGroupModels->getList();

        return view(
            'group.store',
            [
                'pageName'          => 'グループ追加',
                'pageFlg'           => 'Groups',
                'subPageFlg'        => 'GroupsAdd',
                'registFlg'         => $registFlg,
                'idolGroupId'       => $idolGroupId,
                'idolGroupLists'    => $this->idolGroupLists
            ]
        );
    }
}
