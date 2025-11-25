<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi RW')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- AOS - Animate on Scroll --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Google Fonts: Poppins, Inter & Manrope --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&family=Manrope:wght@400;700&display=swap"
        rel="stylesheet">

    <style>
        /* ====================================================== */
        /*                 KONFIGURASI DASAR & WARNA              */
        /* ====================================================== */
        :root {
            --primary-color: #0056b3;
            /* Biru yang lebih dalam */
            --secondary-color: #007bff;
            /* Biru cerah untuk aksen */
            --light-bg: #f8f9fa;
            /* Latar belakang terang */
            --dark-bg: #121212;
            /* Latar belakang gelap */
            --text-dark: #212529;
            --text-light: #f8f9fa;
            --border-radius-md: 0.75rem;
            --border-radius-lg: 1rem;
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 8px 15px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Manrope', 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.7;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all var(--transition-speed) ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transition: all var(--transition-speed) ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* ====================================================== */
        /*                 NAVBAR MODERN (GLASSMORPHISM)          */
        /* ====================================================== */
        .navbar {
            transition: background-color var(--transition-speed) ease-in-out;
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: var(--shadow-sm);
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 800;
        }

        .nav-link {
            font-weight: 600;
            color: #555;
            position: relative;
            transition: color var(--transition-speed) ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--primary-color);
            transition: width var(--transition-speed) ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 60%;
        }


        /* ====================================================== */
        /*                       HERO SECTION                     */
        /* ====================================================== */
        .hero-section {
            background: linear-gradient(45deg, rgba(0, 86, 179, 0.7), rgba(0, 123, 255, 0.5)), url('https://source.unsplash.com/1600x900/?modern,community,architecture') no-repeat center center;
            background-size: cover;
            color: var(--text-light);
            padding: 10rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 150px;
            background: var(--light-bg);
            clip-path: polygon(0 100%, 100% 100%, 100% 0);
        }


        .hero-section h1 {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .hero-section .lead {
            font-weight: 400;
            font-size: 1.25rem;
        }

        /* ====================================================== */
        /*                       SECTION UMUM                     */
        /* ====================================================== */
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 800;
            position: relative;
            display: inline-block;
            padding-bottom: 0.5rem;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 4px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .section-title p {
            color: #6c757d;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 1rem auto 0 auto;
        }

        .section-divider {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0));
            margin: 4rem 0;
        }

        /* ====================================================== */
        /*                    KARTU BERITA                       */
        /* ====================================================== */
        .news-card {
            background-color: #fff;
            border: none;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }

        /* Gambar Card */
        .news-card .card-img-container {
            position: relative;
            overflow: hidden;
            height: 220px;
        }

        .news-card .card-img-top {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .news-card:hover .card-img-top {
            transform: scale(1.08);
        }

        /* Overlay Gradient */
        .news-card .card-img-container::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.4) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .news-card:hover .card-img-container::after {
            opacity: 1;
        }

        /* Konten Card */
        .news-card .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .news-card .card-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        .news-card:hover .card-title {
            color: var(--primary);
        }

        .news-card .card-text {
            line-height: 1.5;
        }

        /* ====================================================== */
        /*              STRUKTUR ORGANISASI (FLIP CARD)           */
        /* ====================================================== */
        .flip-card-container {
            perspective: 1500px;
        }

        .flip-card {
            position: relative;
            width: 100%;
            min-height: 400px;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card-container:hover .flip-card {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        .flip-card-front {
            color: white;
        }

        .flip-card-front img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .flip-card-front .front-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        }

        .flip-card-back {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
        }

        /* ====================================================== */
        /*                AGENDA (TIMELINE)                       */
        /* ====================================================== */
        .timeline {
            position: relative;
            padding: 2rem 0;
            margin: 0 auto;
            max-width: 900px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            width: 50%;
            padding: 1rem 2rem;
            margin-bottom: 3rem;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            padding-right: 4rem;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
            padding-left: 4rem;
        }

        .timeline-content {
            background-color: white;
            padding: 1.5rem;
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-sm);
            position: relative;
            transition: all var(--transition-speed) ease;
        }

        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .timeline-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            border: 4px solid var(--light-bg);
            z-index: 10;
            box-shadow: 0 0 0 4px var(--primary-color);
        }

        .timeline-item:nth-child(odd) .timeline-icon {
            right: -25px;
        }

        .timeline-item:nth-child(even) .timeline-icon {
            left: -25px;
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 25px;
            }

            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 5rem;
                padding-right: 1rem;
                text-align: left !important;
            }

            .timeline-icon {
                left: 0 !important;
            }
        }

        /* ====================================================== */
        /*                  GALERI & PROFIL                       */
        /* ====================================================== */
        .gallery-item {
            overflow: hidden;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
            position: relative;
            display: block;
        }

        .gallery-item img {
            transition: transform 0.5s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            color: white;
            opacity: 0;
            transition: opacity var(--transition-speed) ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .profile-card {
            background: white;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
            padding: 2.5rem;
            transition: all var(--transition-speed) ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .profile-card .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem auto;
            color: white;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        /* ====================================================== */
        /*            CSS BARU UNTUK HALAMAN DETAIL BERITA        */
        /* ====================================================== */
        .article-hero {
            position: relative;
            height: 60vh;
            min-height: 400px;
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .article-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3));
        }

        .article-hero .container {
            position: relative;
            z-index: 2;
        }

        .article-content {
            line-height: 1.8;
        }

        .sidebar-widget {
            padding: 1.75rem;
            background-color: #ffffff;
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-sm);
            position: sticky;
            /* Membuat sidebar tetap terlihat saat scroll */
            top: 100px;
            /* Jarak dari atas */
        }

        .sidebar-widget .list-group-item {
            border-radius: 0;
            border-left: 0;
            border-right: 0;
            transition: background-color var(--transition-speed) ease;
        }

        .sidebar-widget .list-group-item:hover {
            background-color: #f1f1f1;
        }

        /* ====================================================== */
        /*                         WARGA GALERI INDEX             */
        /* ====================================================== */
        .gallery-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .object-fit-cover {
            object-fit: cover;
        }



        /* ====================================================== */
        /*                         FOOTER                         */
        /* ====================================================== */
        footer {
            background-color: var(--dark-bg);
            color: rgba(255, 255, 255, 0.7);
            padding: 3rem 0;
        }

        footer .bi-heart-fill {
            color: #e83e8c;
        }
    </style>
</head>

<body>

    {{-- Navbar Publik --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-buildings-fill"></i> RW 10
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="publicNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.berita.index') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.agenda.index') }}">Agenda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.galeri.index') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.struktur.index') }}">Struktur</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.profil.show') }}">Profil</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten Utama --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Sistem Informasi RW. Dikembangkan dengan <i
                    class="bi bi-heart-fill"></i>.</p>
        </div>
    </footer>

    {{-- JavaScript Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
        });

        // Efek Glassmorphism pada Navbar saat scroll
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('scrolled');
                navbar.classList.add('bg-transparent');
            }
        });
    </script>
</body>

</html>
