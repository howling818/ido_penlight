<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\IdolGroup;
use App\Models\Member;
use App\Models\Penlight;
use App\Http\Requests\Member\CreateRequest;
use App\Http\Requests\Member\UpdateRequest;

class MemberController extends Controller
{
    private $idolGroupModels;
    private $idolGroupMemberModels;
    private $penlightModels;
    private $idolGroupLists;
    private $penlightLists;
    public function __construct()
    {
        $this->idolGroupModels = new IdolGroup();
        $this->idolGroupMemberModels = new Member();
        $this->penlightModels = new Penlight();
        $this->idolGroupLists = $this->idolGroupModels->getList();
        $this->penlightLists = $this->penlightModels->list();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idolGroupMembers = $this->idolGroupMemberModels->search($request);

        return view(
            'member.index',
            [
                'pageName'          => 'メンバー一覧',
                'pageFlg'           => 'Members',
                'idolGroupLists'    => $this->idolGroupLists,
                'penlightLists'     => $this->penlightLists,
                'idolGroupMembers'  => $idolGroupMembers,
                'searchExistsFlg'   => $idolGroupMembers->isEmpty()
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
            'member.create',
            [
                'pageName'          => 'メンバー追加',
                'pageFlg'           => 'Members',
                'pageFlg'           => 'AddMembers',
                'idolGroupLists'    => $this->idolGroupLists,
                'penlightLists'     => $this->penlightLists
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Member\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        // 登録処理
        $connection = DB::connection();
        $connection->beginTransaction();
        $registFlg = true;
        try {
            $this->idolGroupMemberModels->insert($request);
            $connection->commit();
        } catch (Exception $e) {
            $registFlg = false;
            $connection->rollback();
        }

        return view(
            'member.store',
            [
                'pageName'          => 'メンバー追加',
                'pageFlg'           => 'Members',
                'pageFlg'           => 'AddMembers',
                'idolGroupLists'    => $this->idolGroupLists,
                'registFlg'         => $registFlg
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Member\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
