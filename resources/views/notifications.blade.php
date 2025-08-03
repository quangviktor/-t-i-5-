<h2>Thông báo của bạn</h2>
<ul>
@foreach ($notifications as $notification)
    <li>{{ $notification->data['message'] }} - <a href="{{ $notification->data['url'] }}">Chi tiết</a></li>
@endforeach
</ul>
