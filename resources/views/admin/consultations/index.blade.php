@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Danh sách tư vấn</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nội dung</th>
                    <th>Người gửi</th>
                    <th>Ẩn danh</th>
                    <th>Thời gian</th>
                    <th>Phản hồi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultations as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ Str::limit($item->message, 50) }}</td>
                        <td>{{ $item->is_anonymous ? 'Ẩn danh' : optional($item->user)->name }}</td>
                        <td>{{ $item->is_anonymous ? '✔️' : '' }}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.consultations.show', $item->id) }}" class="btn btn-sm btn-primary">
                                Xem & Phản hồi
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Không có yêu cầu tư vấn nào.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
