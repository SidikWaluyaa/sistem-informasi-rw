@extends('layouts.public')

@section('title', 'Profil ' . ($profil->nama_rw ?? 'RW'))

@section('content')

    <style>
        /* ============================================== */
        /*         MODERN PROFIL PAGE STYLES             */
        /* ============================================== */

        /* Hero Section with Parallax */
        .profil-hero {
            position: relative;
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #23a6d5);
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

        .profil-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
        }

        .hero-logo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.5rem);
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.2s backwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Wave Separator */
        .wave-separator {
            position: relative;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave-separator svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }

        .wave-separator .shape-fill {
            fill: #f8f9fa;
        }

        /* Content Container */
        .profil-content {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* Info Cards */
        .info-card-profil {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .info-card-profil::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .info-card-profil:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.2);
        }

        .info-icon-profil {
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

        .info-card-profil:hover .info-icon-profil {
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

        /* Section Title */
        .section-title-profil {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title-profil h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .section-title-profil h2::after {
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

        /* Visi Misi Cards */
        .visi-misi-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .visi-misi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, #667eea, #764ba2);
        }

        .visi-misi-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.15);
        }

        .visi-misi-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .visi-misi-title i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .visi-content {
            font-size: 1.25rem;
            font-style: italic;
            color: #4a5568;
            line-height: 1.8;
            padding: 1.5rem;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border-radius: 15px;
            border-left: 4px solid #667eea;
        }

        .misi-content {
            font-size: 1.1rem;
            color: #4a5568;
            line-height: 1.8;
            white-space: pre-wrap;
        }

        /* Sejarah Card */
        .sejarah-card {
            background: white;
            border-radius: 25px;
            padding: 3.5rem;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .sejarah-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #23a6d5);
        }

        .sejarah-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .sejarah-content {
            font-size: 1.15rem;
            color: #4a5568;
            line-height: 1.9;
            white-space: pre-wrap;
            text-align: justify;
        }

        /* Decorative Elements */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            pointer-events: none;
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            top: -100px;
            right: -100px;
        }

        .circle-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #f093fb, #23a6d5);
            bottom: -50px;
            left: -50px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profil-hero {
                min-height: 50vh;
                padding: 100px 15px 60px;
            }

            .hero-logo {
                width: 110px;
                height: 110px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .profil-content {
                padding: 3rem 0;
            }

            .info-card-profil,
            .visi-misi-card {
                padding: 2rem;
            }

            .sejarah-card {
                padding: 2rem;
            }

            .visi-misi-title {
                font-size: 1.6rem;
            }

            .visi-content {
                font-size: 1.1rem;
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .section-title-profil {
                margin-bottom: 2rem;
            }

            .info-icon-profil {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }

            .sejarah-icon {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="profil-hero">
        <div class="container hero-content">
            @if ($profil->logo)
                <img src="{{ asset('storage/' . $profil->logo) }}" class="hero-logo" alt="Logo {{ $profil->nama_rw }}"
                    data-aos="zoom-in">
            @endif

            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">
                {{ $profil->nama_rw ?? 'RW' }}
            </h1>

            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                Mengenal Lebih Dekat Lingkungan Kita
            </p>
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

    <div class="profil-content">
        <div class="container">

            <!-- Informasi Kontak -->
            <section class="mb-5">
                <div class="section-title-profil" data-aos="fade-up">
                    <h2>Informasi Kontak</h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="info-card-profil">
                            <div class="info-icon-profil">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                            <h4 class="info-title">Ketua RW</h4>
                            <p class="info-text">{{ $profil->ketua_rw ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-card-profil">
                            <div class="info-icon-profil">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <h4 class="info-title">Alamat Sekretariat</h4>
                            <p class="info-text">{{ $profil->alamat ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card-profil">
                            <div class="info-icon-profil">
                                <i class="bi bi-telephone-inbound-fill"></i>
                            </div>
                            <h4 class="info-title">Kontak</h4>
                            <p class="info-text">{{ $profil->kontak ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Visi & Misi -->
            <section class="mb-5 py-5">
                <div class="section-title-profil" data-aos="fade-up">
                    <h2>Visi & Misi</h2>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="visi-misi-card">
                            <h3 class="visi-misi-title">
                                <i class="bi bi-eye-fill"></i>
                                Visi
                            </h3>
                            <blockquote class="visi-content">
                                "{{ $profil->visi ?? 'Visi belum ditetapkan.' }}"
                            </blockquote>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="visi-misi-card">
                            <h3 class="visi-misi-title">
                                <i class="bi bi-bullseye"></i>
                                Misi
                            </h3>
                            <div class="misi-content">{{ $profil->misi ?? 'Misi belum ditetapkan.' }}</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sejarah -->
            <section class="mb-5 py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up">
                        <div class="sejarah-card">
                            <div class="decorative-circle circle-1"></div>
                            <div class="decorative-circle circle-2"></div>

                            <div class="text-center">
                                <div class="sejarah-icon">
                                    <i class="bi bi-book-fill"></i>
                                </div>
                                <div class="section-title-profil">
                                    <h2>Sejarah Singkat</h2>
                                </div>
                            </div>

                            <div class="sejarah-content">{{ $profil->sejarah ?? 'Sejarah RW belum ditulis.' }}</div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

@endsection