<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ứng dụng tham vấn')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon (Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .nav-ellipse {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 50px;
            background-color: white;
            color: #0d6efd;
            border: 2px solid #0d6efd;
            font-weight: 500;
            margin: 5px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .nav-ellipse:hover {
            background-color: #0d6efd;
            color: white;
        }

        .nav-ellipse i {
            margin-right: 5px;
        }

        .logo-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-title img {
            height: 50px;
        }

        .logout-form {
            display: inline-block;
        }

        .logout-button {
            background: none;
            border: none;
            color: white;
            text-decoration: underline;
            cursor: pointer;
        }

        .logout-button:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white p-3 mb-2">
        <div class="container d-flex flex-column align-items-center">
            <div class="logo-title mb-2 d-flex justify-content-between w-100">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('images/tlu-logo (2).png') }}" alt="Logo">
                    <h1 class="h4 mb-0">Tư vấn tâm lý Đại học Thủy Lợi</h1>
                </div>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">Đăng xuất</button>
                    </form>
                @endauth
            </div>

            <div class="d-flex justify-content-center flex-wrap mt-2">
                <a href="{{ route('admin.users.index') }}" class="nav-ellipse"><i class="fas fa-users"></i> Người dùng</a>
                <a href="{{ route('admin.consultations.index') }}" class="nav-ellipse"><i class="fas fa-comment-dots"></i> Yêu cầu tư vấn</a>
                <a href="{{ route('admin.appointments.index') }}" class="nav-ellipse"><i class="fas fa-calendar-alt"></i> Đặt lịch</a>
                <a href="{{ route('admin.responses.index') }}" class="nav-ellipse"><i class="fas fa-reply"></i> Phản hồi</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-4">
        @if(auth()->check())
            <div class="mb-4">
                <h5>🔔 Thông báo:</h5>
                <ul class="list-group">
                    @foreach(auth()->user()->notifications as $notification)
                        <li class="list-group-item">{{ $notification->data['message'] }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-5">
        <p class="mb-0">&copy; {{ date('Y') }} Ứng dụng tham vấn</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
