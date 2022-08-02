@extends('layout')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Member Search</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Member Search</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="get" action="{{ route('member.index') }}">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Member Search</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Group:</label>
                                                <select name="group_id" class="select2" style="width: 100%;">
                                                    <option></option>
                                                    @foreach ($idolGroupLists as $idolGroup)
                                                    <option value="{{$idolGroup->id}}" {{ old('group_id') == $idolGroup->id ? 'selected' : '' }}>{{$idolGroup->group_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Penlight Color:</label>
                                                <select name="penlight" class="select2" style="width: 100%;">
                                                    <option></option>
                                                    @foreach ($penlightLists as $penlight)
                                                    <option value="{{$penlight->id}}" {{ old('penlight') == $penlight->id ? 'selected' : '' }}>{{$penlight->color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Member Name:</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="search" name="member_name" class="form-control form-control-lg" placeholder="Type Member Name" value="{{ old('member_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Member Kana:</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="search" name="member_kana" class="form-control form-control-lg" placeholder="Type Member Kana" value="{{ old('member_kana') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Member NickName:</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="search" name="member_nickname" class="form-control form-control-lg" placeholder="Type Member NickName" value="{{ old('member_nickname') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <button type="button" class="btn btn-info float-right move_method" data-action="{{ route('member.create') }}">Member Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                @if ($searchExistsFlg)
                <div class="row mt-3">
                    <div class="col-md-10 offset-md-1">
                        @foreach ($idolGroupMembers as $member)
                        @if ($loop->first || ($loop->index % 3) == 0) <div class="row"> @endif
                        <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    @if (!is_null($member->member_kana))<p class="text-muted text-center">{{$member->member_kana}}</p>@endif
                                    <h3 class="profile-username text-center">{{$member->member_name}}</h3>
                                    @if (!is_null($member->member_nickname))<p class="text-muted text-center">{{$member->member_nickname}}</p>@endif

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <!-- Group -->
                                        <li class="list-group-item"></li>
                                        <!-- penLight -->
                                        <li class="list-group-item"></li>
                                        <!-- SNS -->
                                        <li class="list-group-item">
                                            @if (!is_null($member->twitter)) <a href="https://twitter.com/{{$member->twitter}}"><i class="nav-icon fas fa-twitter"></i></a> @endif
                                            @if (!is_null($member->instagram)) <a href="https://www.instagram.com/{{$member->instagram}}"><i class="nav-icon fas fa-instagram"></i></a> @endif
                                            @if (!is_null($member->tiktok)) <a href="https://www.tiktok.com/@{{$member->tiktok}}"><i class="nav-icon fas fa-tiktok"></i></a> @endif
                                            @if (!is_null($member->Youtube)) <a href="https://youtube.com/c/{{$member->Youtube}}"><i class="nav-icon fas fa-youtube"></i></a> @endif
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        @if ($loop->last || ($loop->index % 3) == 2) </div> @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </sction>
        <!-- /.content -->
@endsection
