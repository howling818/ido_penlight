@extends('layout')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Group</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Member</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Member</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('member.store') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Group:</label>
                                            <select name="group_id" class="select2 form-select" style="width: 100%;" required>
                                                <option></option>
                                                @foreach ($idolGroupLists as $idolGroup)
                                                <option value="{{$idolGroup->id}}" {{ old('group_id') == $idolGroup->id ? 'selected' : '' }}>{{$idolGroup->group_name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a Group.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Member Name:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="member_name" class="form-control form-control-lg" placeholder="Type Member Name" value="{{ old('member_name') }}" required>
                                                @error('member_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Member Kana:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="member_kana" class="form-control form-control-lg" placeholder="Type Member Kana" value="{{ old('member_kana') }}">
                                                @error('member_kana')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Member NickName:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="member_nickname" class="form-control form-control-lg" placeholder="Type Member NickName" value="{{ old('member_nickname') }}">
                                                @error('member_nickname')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Birthday:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
<div class="input-group-text"><i class="fa fa-calendar"></i></div>
</div>
</div>
                                            <div class="input-group date" id="birthday" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input birthday" data-target="#birthday">
                                                <div class="input-group-append" data-target=".birthday" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @error('birthday')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">penLightColor-1:</label>
                                            <select name="pen_light_id1" class="select2 form-select" style="width: 100%;" required>
                                                <option color-code=""></option>
                                                @foreach ($penlightLists as $penlight)
                                                <option value="{{$penlight->id}}" color-code="{{$penlight->color_code}}" {{ old('pen_light_id1') == $penlight->id ? 'selected' : '' }}>{{$penlight->color_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('pen_light_id1')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">penLightColor-2:</label>
                                            <select name="pen_light_id2" class="select2 form-select" style="width: 100%;">
                                                <option color-code=""></option>
                                                @foreach ($penlightLists as $penlight)
                                                <option value="{{$penlight->id}}" color-code="{{$penlight->color_code}}" {{ old('pen_light_id2') == $penlight->id ? 'selected' : '' }}>{{$penlight->color_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('pen_light_id2')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">penLightColor-3:</label>
                                            <select name="pen_light_id3" class="select2 form-select" style="width: 100%;">
                                                <option color-code=""></option>
                                                @foreach ($penlightLists as $penlight)
                                                <option value="{{$penlight->id}}" color-code="{{$penlight->color_code}}" {{ old('pen_light_id3') == $penlight->id ? 'selected' : '' }}>{{$penlight->color_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('pen_light_id3')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Twitter:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="twitter" class="form-control form-control-lg" placeholder="Type Twitter Account" value="{{ old('twitter') }}">
                                            </div>
                                            @error('twitter')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Instagram:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="instagram" class="form-control form-control-lg" placeholder="Type instagram Account" value="{{ old('instagram') }}">
                                            </div>
                                            @error('instagram')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Tiktok:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="tiktok" class="form-control form-control-lg" placeholder="Type Tiktok Account" value="{{ old('tiktok') }}">
                                            </div>
                                            @error('tiktok')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Youtube:</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" name="Youtube" class="form-control form-control-lg" placeholder="Type Youtube Account" value="{{ old('tiktok') }}">
                                            </div>
                                            @error('Youtube')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </sction>
        <!-- /.content -->
@endsection
