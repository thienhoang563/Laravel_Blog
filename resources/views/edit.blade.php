@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Cập nhật BLOG</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{route('update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}" required>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" name="author" value="{{ $blog->author }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" required>{{ $blog->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
@endsection
