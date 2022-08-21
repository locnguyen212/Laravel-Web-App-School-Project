@extends('admin.master')
@section('title', 'Origami Create')
@section('module', 'Origami')
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
            <form action="{{ route('admin.origami.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Origami Name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="2" placeholder="Enter Content">{{ old('content') }}</textarea>
                        <script>
                            CKEDITOR.replace( 'content' );
                        </script>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" name="url" placeholder="Enter URL, Leave This If You Don't Need" value="{{ old('url') }}">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id">
                            @php
                                $id = false;
                                if(auth()->user()->level != 1){
                                    $id = auth()->user()->id;
                                }

                                $parent = DB::table('category')
                                            ->when($id, function($query, $id){
                                                return $query->where('user_id', $id);
                                            })
                                            ->whereNull('deleted_at')
                                            ->get();
                                dequy($parent); 
                            @endphp
                        </select>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Intro Image</label>
                        <input type="file" class="form-control" name="intro_image">
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