@extends('admin.master')
@section('title', 'Origami Edit')
@section('module', 'Origami')
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
            <form action="{{ route('admin.origami.update', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="{{ old('name', $oldData->name) }}">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="2" placeholder="Enter Content">{{ old('content', $oldData->content) }}</textarea>
                        <script>
                            CKEDITOR.replace( 'content' );
                        </script>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" name="url" placeholder="Enter URL" value="{{ old('url', $oldData->url) }}">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="Enter Slug" value="{{ old('url', $oldData->slug) }}">
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
                        <div class="form-group">
                            <img src="{{ file_exists('images/'.$oldData->intro_image)? asset('images/'.$oldData->intro_image) : $oldData->intro_image }}" height="50px" width="50px">
                        </div>
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