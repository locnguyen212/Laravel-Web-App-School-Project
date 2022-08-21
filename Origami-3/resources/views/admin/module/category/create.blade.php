@extends('admin.master')
@section('title', 'Category Create')
@section('module', 'Category')
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
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" value="{{ old('name') }}">
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Parent Category</label>
                        <select name="parent_id">
                            @if (auth()->user()->level == 1)
                                <option value="0"> Root </option>
                            @endif
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

                @if (auth()->user()->level == 1)
                    <div class="card-body">
                        <div class="form-group">
                            <label>Admin In Charge</label>
                            <select name="user_id">
                                @foreach ($user as $user)
                                    <option value="{{$user->id}}"> {{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection