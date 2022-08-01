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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Group</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Group</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('group.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputGroupName">Group Name <span class="text-danger">※Required</span></label>
                                    <input type="text" class="form-control" id="inputGroupName" placeholder="Enter Group Name">
                                </div>
                                <div class="form-group">
                                    <label for="inputGroupKana">Group Kana</label>
                                    <input type="text" class="form-control" id="inputGroupKana" placeholder="Enter Group Kana">
                                </div>
                                <div class="form-group">
                                    <label for="inputGroupSiteURL">Group Office Site URL</label>
                                    <input type="text" class="form-control" id="inputGroupSiteURL" placeholder="Enter Group Office Site URL">
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
