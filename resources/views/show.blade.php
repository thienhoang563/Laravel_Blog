@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Chi tiết bài viết
    </div>

    <div class="row">
        <!-- Kiểm tra biến $blog được truyền sang từ BlogController -->
        <!-- Nếu biến $blog không tồn tại thì hiển thị thông báo -->
        @if(!isset($blog))
            <p class="text-danger">Không có sản phẩm nào.</p>
        @else

        <!-- Nếu biến $blog tồn tại thì hiển thị sản phẩm -->
            <div class="col-12">
                <div class="card text-left" style="width: 100%;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $blog->title }}</h3>
                        <p class="card-text">{{ $blog->author }}</p>
                        <p class="card-text text-dark">${{ $blog->description }}</p>
                        <img class="form-control-file" src="{{ asset('storage/'.$blog->image) }}" style="width: 200px; height: 200px"/>
                        <!-- Nút XEM chuyển hướng người dùng quay lại trang danh sách sản phẩm -->
                        <a href="{{ route('index') }}" class="btn btn-primary">< Quay lại </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection