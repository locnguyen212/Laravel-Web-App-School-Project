@extends('admin.master')
@section('title', 'Image Create')
@section('module', 'Image')
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
            <form action="{{ route('admin.image.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image[]" multiple>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Origami</label>
                        <select name="origami_id">
                            @foreach ($origami as $origami)
                                <option value="{{$origami->id}}"> {{$origami->name}} </option>
                            @endforeach
                        </select>
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