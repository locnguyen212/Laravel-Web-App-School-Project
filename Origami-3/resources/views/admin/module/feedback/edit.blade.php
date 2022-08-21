@extends('admin.master')
@section('title', 'Category Edit')
@section('module', 'Category')
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
            <form action="{{ route('admin.feedback.update', ['id' => $id]) }}" method="post">
                @csrf

                <div class="card-body">
                    <select name="status">
                        <option value="1">Not Approve</option>
                        <option value="2">Approve</option>
                    </select>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection