@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Create new BLOG</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title BLOG</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" name="author" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">ADD NEW</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false">Back</button>
            </form>
        </div>
    </div>