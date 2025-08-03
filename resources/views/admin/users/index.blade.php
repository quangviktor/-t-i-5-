@extends('layouts.app') {{-- Hoặc 'layouts.app' nếu bạn dùng layout đó --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Danh sách người dùng</h1>
    <table class="table-auto w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Tên</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Vai trò</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-center">
                <td class="px-4 py-2 border">{{ $user->id }}</td>
                <td class="px-4 py-2 border">{{ $user->name }}</td>
                <td class="px-4 py-2 border">{{ $user->email }}</td>
                <td class="px-4 py-2 border">{{ $user->role ?? 'user' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

