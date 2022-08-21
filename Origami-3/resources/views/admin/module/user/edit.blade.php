@extends('admin.master')
@section('title', 'User Edit')
@section('module', 'User')
@section('action', 'Edit')


@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Please Enter Your Name" value="{{ $oldData->name }}">
                    </div>
                </div>

                @if (auth()->user()->level == 1)
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Please Enter Email" value="{{ $oldData->email }}">
                        </div>
                    </div>
                @endif


                <div class="card-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Please Enter New Password, Leave This Box If You Don't Want To Change It">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Password Confirm</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Please Enter Password Again">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="form-group">
                            <img src=" {{ file_exists('images/'.$oldData->avatar)? asset('images/'.$oldData->avatar) : $oldData->avatar }} " height="50px" width="50px">
                        </div>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection