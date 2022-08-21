@extends('admin.master')
@section('title', 'User Create')
@section('module', 'User')
@section('action', 'Create')


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
            <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Please Enter Your Name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Please Enter Email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Please Enter Password">
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