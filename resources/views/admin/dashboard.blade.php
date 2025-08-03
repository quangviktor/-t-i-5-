@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white text-gray-800">
    {{-- Header --}}
    <div class="bg-blue-800 text-white p-4 flex items-center justify-between shadow">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo (2).png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <h1 class="text-lg font-semibold">Tư vấn Tâm lý Đại học Thủy Lợi</h1>
        </div>
        <div>
            <a href="{{ route('logout') }}" class="text-sm hover:underline">Đăng xuất</a>
        </div>
    </div>

    {{-- Nội dung chính --}}
    <div class="p-6">
        <h2 class="text-xl font-bold mb-6 text-blue-700 text-center">Bảng điều khiển quản trị</h2>

        {{-- Đã xóa phần các nút hình tròn --}}
    </div>
</div>
@endsection

