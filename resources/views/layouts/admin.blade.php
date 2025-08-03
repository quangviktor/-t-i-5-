<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tư vấn Tâm lý Đại học Thủy Lợi</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    {{-- Header --}}
    <header class="bg-blue-800 text-white py-4 shadow">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/tlu-logo (2).png') }}" alt="Logo" class="h-12 w-auto">
                <h1 class="text-2xl font-bold">Tư vấn Tâm lý Đại học Thủy Lợi</h1>
            </div>

            {{-- Logout chỉ hiển thị nếu đăng nhập --}}
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm hover:text-gray-300 underline bg-transparent border-none cursor-pointer">
                        Đăng xuất
                    </button>
                </form>
            @endauth
        </div>
    </header>

    {{-- Nội dung --}}
    <main class="max-w-7xl mx-auto py-8 px-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-blue-900 text-white text-center py-4 mt-8">
        &copy; {{ date('Y') }} Trường Đại học Thủy Lợi. All rights reserved.
    </footer>
</body>
</html>
