@extends('admin.master')
@section('title', 'Replay Feedback')
@section('module', 'Feedback')
@section('action', 'Replay')


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
            <form action="{{route('admin.feedback.storereplay',['id'=>$data->id])}}" method="post">
                @csrf

                <div class="card-body">
                    <label for="">Comment</label> 
                    <p>{{$data->content}}</p>
                </div>
                <div class="card-body">
                    <label for="">Replay Comment</label>
                    <textarea type="text" class="form-control" name="content" cols="30" rows="4" placeholder="Replay Comment"></textarea>
                    <script>
                        CKEDITOR.replace( 'content' );
                    </script>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Replay</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection