@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đặt lịch tham vấn</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf

        <div class="form-group">
            <label>Thời gian</label>
            <input type="datetime-local" name="scheduled_at" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Hình thức</label>
            <select name="method" class="form-control" required>
                <option value="online">Online</option>
                <option value="offline">Trực tiếp</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label>Tên (tuỳ chọn)</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-check mt-2">
            <input type="checkbox" name="is_anonymous" class="form-check-input" id="anonCheck">
            <label class="form-check-label" for="anonCheck">Ẩn danh</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Gửi yêu cầu</button>
    </form>
</div>
@endsection
