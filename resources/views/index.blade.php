@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Danh sách BLOG
    </div>

    <div class="form-group">
        <a href="{{ route('create') }}" class="btn btn-primary">ADD NEW</a>
    </div>

    <div class="row">
        <!-- Kiểm tra biến $blogs được truyền sang từ blogController -->
        <!-- Nếu biến $blogs không tồn tại hoặc có số lượng băng 0 (không có sản phẩm nào) thì hiển thị thông báo -->

        @if(!isset($blogs) || count($blogs) === 0)
            <p class="text-danger">Không có sản phẩm nào.</p>
        @else
        <!-- Nếu biến $blogs tồn tại thì hiển thị sản phẩm -->
            @foreach($blogs as $key => $blog)
                <div class="col-4">
                    <div class="card text-left" style="width: 30rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->author }}</p>
                            <p class="card-text text-dark">{{ $blog->description }}</p>
                            @if($blog->image)
                            <img class="form-control-file" src="{{ asset('storage/'.$blog->image) }}" style="width: 200px; height: 200px" width="100px" height="100px"/>
                            @else
                                {{'No Image'}}
                            @endif
                            <br>
                            <!-- Nút XEM chuyển hướng người dùng sang trang chi tiết -->
                            <a href="{{ route('show', $blog->id) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('edit', $blog->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="{{ route('destroy', $blog->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure want to delete?')">Xóa</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection