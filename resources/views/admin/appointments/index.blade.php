@extends('layouts.admin')

@section('content')
    <h1>Danh sách lịch hẹn</h1>

    <ul>
        @foreach ($appointments as $appointment)
            <li>{{ $appointment->name }} - {{ $appointment->date }} - {{ $appointment->email }}</li>
        @endforeach
    </ul>
@endsection
