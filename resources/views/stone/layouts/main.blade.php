<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cơ sở sản xuất đá ốp lát DN">
    <title>Cơ sở sản xuất đá ốp lát DN - @yield('title', 'Đá tự nhiên cao cấp')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('images/default/logo.png') }}">
    <meta name="description" content="@yield('meta_description', 'Daoplatdn.com chuyên cung cấp đá ốp lát bền, đẹp, giá rẻ, hợp lý, phục vụ nhiệt tình.')" />
    <link rel="canonical" href="{{ url()->current() }}">
    <style>
        :root {
            --primary-color: #c8a97e;
            --secondary-color: #4d4d4d;
            --dark-color: #333333;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: var(--secondary-color);
            overflow-x: hidden;
        }

        /* Header & Navigation */
        .top-bar {
            background-color: var(--dark-color);
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
        }

        .top-bar a:hover {
            color: var(--primary-color);
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar-brand img {
            max-height: 60px;
        }

        .navbar-nav .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            padding: 8px 16px;
            position: relative;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary-color);
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: all 0.3s;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 70%;
        }

        /* Hero Section */
        .hero-slider {
            position: relative;
            height: 600px;
        }

        .hero-slide {
            height: 600px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 2;
            width: 80%;
            max-width: 800px;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 500;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #b89968;
            border-color: #b89968;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 500;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Section Styles */
        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 15px;
        }

        .section-title p {
            font-size: 18px;
            color: var(--secondary-color);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }

        /* Product Card */
        .product-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-card .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 20px;
        }

        .product-card .card-title {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-card .card-text {
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .product-card .card-footer {
            background-color: transparent;
            border-top: 1px solid #eee;
            padding: 15px 20px;
        }

        /* Category Card */
        .category-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 30px;
            height: 300px;
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s;
        }

        .category-card:hover img {
            transform: scale(1.1);
        }

        .category-card .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.7));
            display: flex;
            align-items: flex-end;
            padding: 20px;
            transition: all 0.3s;
        }

        .category-card:hover .overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.8));
        }

        .category-card .category-content {
            color: white;
            width: 100%;
        }

        .category-card .category-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 70px 0 0;
        }

        footer h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 25px;
            font-size: 20px;
        }

        footer p,
        footer a {
            color: #bbb;
            font-size: 15px;
        }

        footer a {
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            margin-bottom: 10px;
        }

        footer a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        footer .contact-info i {
            color: var(--primary-color);
            margin-right: 10px;
            width: 20px;
        }

        footer .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        footer .social-links a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .copyright {
            background-color: #222;
            padding: 20px 0;
            margin-top: 50px;
            text-align: center;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-content h1 {
                font-size: 36px;
            }

            .navbar-collapse {
                background-color: white;
                padding: 15px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
        }

        @media (max-width: 767px) {
            .hero-content h1 {
                font-size: 28px;
            }

            .hero-content p {
                font-size: 16px;
            }

            .section {
                padding: 60px 0;
            }

            .section-title h2 {
                font-size: 28px;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
        
                    <span><i class="fas fa-phone-alt me-2"></i> Hotline: {{$contactInfo->phone ?? ''}}</span>
                    <span class="ms-3"><i class="fas fa-envelope me-2"></i> Email: {{$contactInfo->email ?? ''}}</span>
                </div>
                <div class="col-md-6 text-end">
                    @guest
                        <a href="{{ route('login.index') }}" class="me-3"><i class="fas fa-sign-in-alt me-1"></i> Đăng nhập</a>
                        <a href="{{ route('register.index') }}" class="me-3"><i class="fas fa-user-plus me-1"></i> Đăng ký</a>
                    @else
                        <a href="{{ route('logout') }}" class="text-white" style="text-decoration: none;">
                            <i class="fas fa-sign-out-alt me-1"></i> Đăng xuất
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand py-0" href="{{ route('stone.home') }}">
                <img src="{{ asset('images/default/logov2.png') }}" style="height: 40px !important;" alt="Cơ sở sản xuất đá ốp lát DN Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.home') ? 'active' : '' }}"
                            href="{{ route('stone.home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.products.*') ? 'active' : '' }}"
                            href="{{ route('stone.products.index') }}">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.applications.*') ? 'active' : '' }}"
                            href="{{ route('stone.applications.index') }}">Ứng dụng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.projects.*') ? 'active' : '' }}"
                            href="{{ route('stone.projects.index') }}">Dự án</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.showrooms.*') ? 'active' : '' }}"
                            href="{{ route('stone.showrooms.index') }}">Showroom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.about') ? 'active' : '' }}"
                            href="{{ route('stone.about') }}">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.contact.index') ? 'active' : '' }}"
                            href="{{ route('stone.contact.index') }}">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stone.cart.index') ? 'active' : '' }}"
                            href="{{ route('stone.cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            @if (!Cart::isEmpty())
                                <span class="badge bg-danger rounded-circle">{{ Cart::getTotalQuantity() }}</span>
                            @endif
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('stone.orders.index') ? 'active' : '' }}"
                                href="{{ route('stone.orders.index') }}">
                                <i class="fas fa-clipboard-list"></i>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5>Về chúng tôi</h5>
                    <p class="mb-4">Cơ sở sản xuất đá ốp lát DN - Đơn vị hàng đầu cung cấp và thi công đá tự nhiên cao cấp tại
                        Việt Nam với hơn 10 năm kinh nghiệm.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5>Sản phẩm</h5>
                    <a href="#">Đá Marble</a>
                    <a href="#">Đá Granite</a>
                    <a href="#">Đá Onyx</a>
                    <a href="#">Đá Travertine</a>
                    <a href="#">Đá Terrazzo</a>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5>Liên kết nhanh</h5>
                    <a href="{{ route('stone.home') }}">Trang chủ</a>
                    <a href="{{ route('stone.products.index') }}">Sản phẩm</a>
                    <a href="{{ route('stone.projects.index') }}">Dự án</a>
                    <a href="{{ route('stone.about') }}">Giới thiệu</a>
                    <a href="{{ route('stone.contact.index') }}">Liên hệ</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Theo dõi chúng tôi</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> {{ $contactInfo->address ?? '' }}</p>
                    <p><i class="fas fa-phone me-2"></i> {{ $contactInfo->phone ?? '' }}</p>
                    <p><i class="fas fa-envelope me-2"></i> {{ $contactInfo->email ?? '' }}</p>
                    @if (!empty($contactInfo->working_time))
                        <p><i class="fas fa-clock me-2"></i> {{ $contactInfo->working_time }}</p>
                    @elseif(!empty($contactInfo->working_hours))
                        <p><i class="fas fa-clock me-2"></i> {{ $contactInfo->working_hours }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <p class="mb-0">&copy; {{ date('Y') }} Cơ sở sản xuất đá ốp lát DN. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
