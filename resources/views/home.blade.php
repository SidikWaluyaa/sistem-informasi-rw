@extends('layouts.public')

@section('title', 'Selamat Datang di Website RW')

@section('content')

    <style>
        /* ============================================== */
        /*           MODERN HOME PAGE STYLES             */
        /* ============================================== */

        /* Hero Section with Animated Gradient */
        .hero-modern {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            overflow: hidden;
            padding: 120px 20px 80px;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Animated Particles Background */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
        }

        .particle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: rise 15s infinite ease-in;
        }

        .particle:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
            animation-duration: 12s;
        }

        .particle:nth-child(2) {
            left: 20%;
            animation-delay: 2s;
            animation-duration: 14s;
        }

        .particle:nth-child(3) {
            left: 30%;
            animation-delay: 4s;
            animation-duration: 16s;
        }

        .particle:nth-child(4) {
            left: 40%;
            animation-delay: 1s;
            animation-duration: 13s;
        }

        .particle:nth-child(5) {
            left: 50%;
            animation-delay: 3s;
            animation-duration: 15s;
        }

        .particle:nth-child(6) {
            left: 60%;
            animation-delay: 5s;
            animation-duration: 11s;
        }

        .particle:nth-child(7) {
            left: 70%;
            animation-delay: 2.5s;
            animation-duration: 14s;
        }

        .particle:nth-child(8) {
            left: 80%;
            animation-delay: 4.5s;
            animation-duration: 12s;
        }

        .particle:nth-child(9) {
            left: 90%;
            animation-delay: 1.5s;
            animation-duration: 16s;
        }

        @keyframes rise {
            0% {
                bottom: -10%;
                opacity: 0;
                transform: translateX(0) scale(0.5);
            }

            50% {
                opacity: 1;
            }

            100% {
                bottom: 110%;
                opacity: 0;
                transform: translateX(100px) scale(1.2);
            }
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
            max-width: 900px;
        }

        .hero-logo-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .hero-logo {
            width: 180px;
            height: 180px;
            border-radius: 20px;
            object-fit: cover;
            background: white;
            padding: 10px;
            border: 8px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(255, 255, 255, 0.1);
            animation: float 3s ease-in-out infinite;
            position: relative;
            z-index: 2;
        }

        .hero-logo-wrapper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 230px;
            height: 230px;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.15);
            animation: pulse-ring 2s ease-out infinite;
        }

        .hero-logo-wrapper::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 260px;
            height: 260px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.08);
            animation: pulse-ring 2s ease-out infinite 0.5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: translate(-50%, -50%) scale(0.8);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1.3);
                opacity: 0;
            }
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
            animation: slideInDown 1s ease-out;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2.5vw, 1.5rem);
            margin-bottom: 2rem;
            opacity: 0.95;
            line-height: 1.6;
            animation: slideInUp 1s ease-out 0.3s backwards;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scroll-down {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
            cursor: pointer;
            z-index: 10;
        }

        .scroll-down i {
            font-size: 2.5rem;
            color: white;
            opacity: 0.9;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            40% {
                transform: translateX(-50%) translateY(-15px);
            }

            60% {
                transform: translateX(-50%) translateY(-8px);
            }
        }

        /* Content Container */
        .content-container {
            position: relative;
            z-index: 20;
            padding: 0 15px;
            background: #f8f9fa;
        }

        /* Wave Separator */
        .wave-separator {
            position: relative;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            margin-bottom: 4rem;
        }

        .wave-separator svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }

        .wave-separator .shape-fill {
            fill: #f8f9fa;
        }

        /* Section Title */
        .section-title-modern {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .section-title-modern h2 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title-modern h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .section-title-modern p {
            font-size: 1.15rem;
            color: #6c757d;
            max-width: 700px;
            margin: 1.5rem auto 0;
        }

        /* First Section Spacing */
        .content-container>section:first-child {
            padding-top: 3rem !important;
        }

        /* News Card */
        .news-card-modern {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .news-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .news-card-modern:hover::before {
            transform: scaleX(1);
        }

        .news-card-modern:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .news-img-wrapper {
            position: relative;
            height: 240px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .news-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .news-card-modern:hover .news-img-wrapper img {
            transform: scale(1.1) rotate(2deg);
        }

        .news-date-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #667eea;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .news-body {
            padding: 1.75rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-excerpt {
            color: #718096;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .btn-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            align-self: flex-start;
        }

        .btn-read-more:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-read-more i {
            transition: transform 0.3s ease;
        }

        .btn-read-more:hover i {
            transform: translateX(5px);
        }

        /* Struktur Card */
        .struktur-card-modern {
            position: relative;
            height: 420px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .struktur-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .struktur-card-modern img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .struktur-card-modern:hover img {
            transform: scale(1.15);
        }

        .struktur-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 70%, transparent 100%);
            color: white;
            transition: all 0.4s ease;
        }

        .struktur-card-modern:hover .struktur-overlay {
            background: linear-gradient(to top, rgba(102, 126, 234, 0.95) 0%, rgba(118, 75, 162, 0.9) 100%);
        }

        .struktur-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .struktur-position {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Timeline */
        .timeline-modern {
            position: relative;
            padding: 2rem 0;
            max-width: 1000px;
            margin: 0 auto;
        }

        .timeline-modern::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #667eea, #764ba2, #23a6d5);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            width: 50%;
            padding: 0 3rem;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
            text-align: left;
        }

        .timeline-marker {
            position: absolute;
            top: 0;
            width: 24px;
            height: 24px;
            background: white;
            border: 4px solid #667eea;
            border-radius: 50%;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
            z-index: 2;
        }

        .timeline-item:nth-child(odd) .timeline-marker {
            right: -12px;
        }

        .timeline-item:nth-child(even) .timeline-marker {
            left: -12px;
        }

        .timeline-content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
        }

        .timeline-content:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.15);
        }

        .timeline-date {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .timeline-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .timeline-location {
            color: #718096;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .timeline-item:nth-child(odd) .timeline-location {
            justify-content: flex-end;
        }

        .timeline-desc {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.2);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
            padding: 1.5rem;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-title {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            text-align: center;
        }

        /* Info Cards */
        .info-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .info-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: transform 0.4s ease;
        }

        .info-card:hover .info-icon {
            transform: rotateY(360deg);
        }

        .info-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .info-text {
            color: #718096;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Vision Quote */
        .vision-card {
            background: white;
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .vision-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        }

        .quote-icon {
            font-size: 4rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .vision-text {
            font-size: 1.4rem;
            font-style: italic;
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .vision-author {
            color: #718096;
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-modern {
                min-height: 85vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 60px;
            }

            .hero-logo {
                width: 140px;
                height: 140px;
                border: 6px solid rgba(255, 255, 255, 0.9);
                padding: 8px;
            }

            .hero-logo-wrapper::before {
                width: 180px;
                height: 180px;
            }
            
            .hero-logo-wrapper::after {
                width: 210px;
                height: 210px;
            }
            

            .timeline-modern::before {
                left: 20px;
            }

            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 4rem;
                padding-right: 1rem;
                text-align: left !important;
            }

            .timeline-marker {
                left: 12px !important;
                right: auto !important;
            }

            .timeline-location {
                justify-content: flex-start !important;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .news-img-wrapper {
                height: 200px;
            }

            .struktur-card-modern {
                height: 350px;
            }

}
        @media (max-width: 576px) {
            .section-title-modern {
                margin-bottom: 3rem;
            }

            .info-card {
                padding: 2rem 1.5rem;
            }

            .vision-card {
                padding: 2rem 1.5rem;
            }

            .vision-text {
                font-size: 1.2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-modern">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <div class="container hero-content">
            @if ($profil && $profil->logo)
                <div class="hero-logo-wrapper" data-aos="zoom-in">
                    <img src="{{ asset('storage/' . $profil->logo) }}" class="hero-logo" alt="Logo RW">
                </div>
            @endif

            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">
                {{ $profil->nama_rw ?? 'Sistem Informasi RW' }}
            </h1>

            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                Bersama membangun lingkungan yang informatif, aman, dan sejahtera. Temukan semua informasi terbaru di sini.
            </p>
        </div>

        <div class="scroll-down">
            <i class="bi bi-chevron-double-down"></i>
        </div>
    </section>

    <!-- Wave Separator -->
    <div class="wave-separator">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <div class="container content-container">

        <!-- Berita Section -->
        <section class="py-5" id="berita">
            <div class="section-title-modern" data-aos="fade-up">
                <h2>Berita Terkini</h2>
                <p>Ikuti perkembangan dan informasi terbaru dari lingkungan kita</p>
            </div>

            <div class="row g-4">
                @forelse ($beritas as $index => $berita)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="news-card-modern">
                            <div class="news-img-wrapper">
                                <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://via.placeholder.com/400x250/667eea/ffffff?text=Berita' }}"
                                    alt="{{ $berita->judul }}">
                                <span class="news-date-badge">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $berita->created_at->isoFormat('D MMM Y') }}
                                </span>
                            </div>
                            <div class="news-body">
                                <h3 class="news-title">{{ $berita->judul }}</h3>
                                <p class="news-excerpt">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}
                                </p>
                                <a href="{{ route('warga.berita.show', $berita->id) }}" class="btn-read-more">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center" data-aos="fade-up">
                        <p class="text-muted fs-5">Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Struktur Organisasi Section -->
        <section class="py-5 mt-5" id="struktur">
            <div class="section-title-modern" data-aos="fade-up">
                <h2>Struktur Organisasi</h2>
                <p>Kenali para pengurus yang berdedikasi untuk melayani warga</p>
            </div>

            <div class="row g-4">
                @forelse ($strukturs as $index => $anggota)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div class="struktur-card-modern">
                            <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : 'https://via.placeholder.com/400x500/764ba2/ffffff?text=Pengurus' }}"
                                alt="{{ $anggota->nama }}">
                            <div class="struktur-overlay">
                                <h4 class="struktur-name">{{ $anggota->nama }}</h4>
                                <p class="struktur-position">{{ $anggota->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center" data-aos="fade-up">
                        <p class="text-muted fs-5">Struktur organisasi belum diatur.</p>
                    </div>
                @endforelse
            </div>

            @if($strukturs->count() > 0)
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('warga.struktur.index') }}" class="btn-read-more btn-lg">
                        Lihat Struktur Lengkap
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </section>

        <!-- Agenda Section -->
        <section class="py-5 mt-5" id="agenda">
            <div class="section-title-modern" data-aos="fade-up">
                <h2>Agenda Mendatang</h2>
                <p>Jangan lewatkan kegiatan-kegiatan penting di lingkungan kita</p>
            </div>

            <div class="timeline-modern">
                @forelse ($agendas as $index => $agenda)
                    <div class="timeline-item" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <span class="timeline-date">
                                {{ \Carbon\Carbon::parse($agenda->tanggal)->isoFormat('D MMMM YYYY') }}
                            </span>
                            <h4 class="timeline-title">{{ $agenda->judul }}</h4>
                            <div class="timeline-location">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>{{ $agenda->lokasi }}</span>
                            </div>
                            <p class="timeline-desc">{{ \Illuminate\Support\Str::limit($agenda->deskripsi, 120) }}</p>
                            <a href="{{ route('warga.agenda.show', $agenda->id) }}" class="btn-read-more">
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted p-5" data-aos="fade-up">
                        <i class="bi bi-calendar-x" style="font-size: 4rem; opacity: 0.3;"></i>
                        <p class="mt-3 fs-5">Belum ada agenda terdekat yang dijadwalkan.</p>
                    </div>
                @endforelse
            </div>

            @if($agendas->count() > 0)
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('warga.agenda.index') }}" class="btn-read-more btn-lg">
                        Lihat Semua Agenda
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </section>

        <!-- Galeri Section -->
        <section class="py-5 mt-5" id="galeri">
            <div class="section-title-modern" data-aos="fade-up">
                <h2>Galeri Kegiatan</h2>
                <p>Momen-momen kebersamaan dan kegiatan warga</p>
            </div>

            <div class="gallery-grid">
                @forelse ($galeris as $index => $foto)
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}">
                        <a href="{{ asset('storage/' . $foto->foto) }}" data-bs-toggle="lightbox" data-gallery="gallery-rw"
                            data-title="{{ $foto->judul }}">
                            <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->judul }}">
                            <div class="gallery-overlay">
                                <h5 class="gallery-title">{{ $foto->judul }}</h5>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center" data-aos="fade-up">
                        <p class="text-muted fs-5">Belum ada foto di galeri.</p>
                    </div>
                @endforelse
            </div>

            @if($galeris->count() > 0)
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('warga.galeri.index') }}" class="btn-read-more btn-lg">
                        Lihat Semua Foto
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </section>

        <!-- Profil Section -->
        @if ($profil)
            <section class="py-5 mt-5 mb-5" id="profil">
                <div class="section-title-modern" data-aos="fade-up">
                    <h2>Informasi Kontak</h2>
                    <p>Hubungi kami untuk informasi lebih lanjut</p>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                            <h4 class="info-title">Ketua RW</h4>
                            <p class="info-text">{{ $profil->ketua_rw ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="bi bi-pin-map-fill"></i>
                            </div>
                            <h4 class="info-title">Alamat Sekretariat</h4>
                            <p class="info-text">{{ $profil->alamat ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="bi bi-telephone-inbound-fill"></i>
                            </div>
                            <h4 class="info-title">Kontak & Informasi</h4>
                            <p class="info-text">{{ $profil->kontak ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                @if ($profil->visi)
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="vision-card">
                            <div class="text-center">
                                <i class="bi bi-quote quote-icon"></i>
                                <blockquote class="vision-text">
                                    "{{ \Illuminate\Support\Str::limit($profil->visi, 200) }}"
                                </blockquote>
                                <p class="vision-author">
                                    Visi <strong>{{ $profil->nama_rw }}</strong>
                                </p>
                                <a href="{{ route('warga.profil.show') }}" class="btn-read-more mt-3">
                                    Selengkapnya Tentang Kami
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        @endif

    </div>

@endsection