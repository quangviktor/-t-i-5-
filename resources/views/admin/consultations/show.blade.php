@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Chi tiết tư vấn</h2>

    <div class="card shadow-sm border-primary mb-4">
        <div class="card-body">
            <h5 class="card-title">Nội dung:</h5>
            <p class="card-text">{{ $consultation->message }}</p>

            <p><strong>Người gửi:</strong> 
                {{ $consultation->is_anonymous ? 'Ẩn danh' : optional($consultation->user)->name }}
            </p>

            <p><strong>Thời gian gửi:</strong> 
                {{ $consultation->created_at->format('d/m/Y H:i') }}
            </p>

            @if($consultation->reply)
                <hr>
                <h5 class="text-success">Phản hồi đã gửi:</h5>
                <p>{{ $consultation->reply }}</p>
            @else
                <form method="POST" action="{{ route('admin.consultations.reply', $consultation->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="reply" class="form-label">Phản hồi</label>
                        <textarea name="reply" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Gửi phản hồi</button>
                </form>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.consultations.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection
