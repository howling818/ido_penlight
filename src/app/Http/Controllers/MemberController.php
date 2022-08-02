<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\IdolGroup;
use App\Models\Member;
use App\Models\Penlight;

class MemberController extends Controller
{
    private $idolGroupModels;
    private $idolGroupMemberModels;
    private $penlightModels;
    private $idolGroupLists;
    public function __construct()
    {
        $this->idolGroupModels = new IdolGroup();
        $this->idolGroupMemberModels = new Member();
        $this->penlightModels = new Penlight();
        $this->idolGroupLists = $this->idolGroupModels->getList();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penlightLists = $this->penlightModels->list();
        $idolGroupMembers = $this->idolGroupMemberModels->search($request);

        return view(
            'member.index',
            [
                'pageName'          => 'メンバー一覧',
                'pageFlg'           => 'Members',
                'idolGroupLists'    => $this->idolGroupLists,
                'penlightLists'     => $penlightLists,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
