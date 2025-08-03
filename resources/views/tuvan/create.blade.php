@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gửi yêu cầu tư vấn</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('tu-van.store') }}">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Nội dung tư vấn</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
    </form>
</div>
@endsection
