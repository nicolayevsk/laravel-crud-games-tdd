<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Game CRUD')</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1b2838;
            color: #c7d5e0;
        }

        h1 {
            color: #fff;
        }

        a.btn-primary {
            background-color: #4c6a92;
            border-color: #4c6a92;
        }

        a.btn-primary:hover {
            background-color: #365474;
            border-color: #365474;
        }

        .card {
            background-color: #2a475e;
            border: none;
        }

        .card-horizontal {
            display: flex;
        }

        .card-img-left {
            border-radius: 6px 0px 0px 6px;
            height: 100px;
            object-fit: cover;
            width: 200px;
        }

        .card-body {
            flex: 1;
            padding: 0 10px;
        }

        .card-title {
            color: #e0e0e0;
        }

        .platform_img {
            background-size: contain;
            background-repeat: no-repeat;
            height: 24px;
            margin-right: 4px;
            width: 24px;
        }

        .platform_img.win {
            background-image: url('https://store.steamstatic.com/public/images/v6/icon_platform_win.png?v=3');
        }

        .platform_img.mac {
            background-image: url('https://store.steamstatic.com/public/images/v6/icon_platform_mac.png?v=3');
        }

        .platforms {
            display: flex;
            margin-bottom: 8px;
        }

        .price {
            color: #ffffff;
        }

        .release_date {
            color: #acb2b8;
            font-size: 0.85rem;
            position: absolute;
            right: 4px;
            bottom: 4px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>