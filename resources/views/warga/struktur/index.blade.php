@extends('layouts.public')

@section('title', 'Struktur Organisasi RW')

@section('content')

    <style>
        /* ============================================== */
        /*       MODERN STRUKTUR ORGANISASI STYLES       */
        /* ============================================== */

        /* Hero Section */
        .struktur-hero {
            position: relative;
            min-height: 50vh;
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

        .struktur-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
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
            max-width: 700px;
            margin: 0 auto;
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
        .struktur-content {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* Member Card */
        .member-card {
            position: relative;
            height: 480px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.4s ease;
            background: white;
        }

        .member-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
        }

        .member-image-wrapper {
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        .member-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .member-card:hover .member-image {
            transform: scale(1.1);
        }

        /* Gradient Overlay */
        .member-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 60%, transparent 100%);
            color: white;
            transition: all 0.4s ease;
        }

        .member-card:hover .member-overlay {
            background: linear-gradient(to top, rgba(102, 126, 234, 0.95) 0%, rgba(118, 75, 162, 0.9) 100%);
        }

        .member-name {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .member-position {
            font-size: 1.1rem;
            opacity: 0.95;
            font-weight: 500;
        }

        /* Hover Info */
        .member-info {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            opacity: 0;
            transition: opacity 0.4s ease;
            padding: 2rem;
            width: 100%;
        }

        .member-card:hover .member-info {
            opacity: 1;
        }

        .member-quote {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .member-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .social-link:hover {
            background: white;
            color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Badge for Position */
        .position-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #667eea;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
            transition: all 0.3s ease;
        }

        .member-card:hover .position-badge {
            background: white;
            transform: scale(1.05);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
        }

        .empty-icon {
            font-size: 6rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            opacity: 0.5;
        }

        .empty-text {
            font-size: 1.5rem;
            color: #718096;
            font-weight: 600;
        }

        /* Decorative Elements */
        .member-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            z-index: 3;
        }

        .member-card:hover::before {
            transform: scaleX(1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .struktur-hero {
                min-height: 40vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .struktur-content {
                padding: 3rem 0;
            }

            .member-card {
                height: 400px;
            }

            .member-overlay {
                padding: 1.5rem;
            }

            .member-name {
                font-size: 1.4rem;
            }

            .member-position {
                font-size: 1rem;
            }

            .member-quote {
                font-size: 1rem;
            }

            .social-link {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .member-card {
                height: 380px;
            }

            .position-badge {
                font-size: 0.75rem;
                padding: 6px 12px;
            }

            .empty-state {
                padding: 3rem 1rem;
            }

            .empty-icon {
                font-size: 4rem;
            }

            .empty-text {
                font-size: 1.2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="struktur-hero">
        <div class="container hero-content">
            <h1 class="hero-title" data-aos="fade-up">
                <i class="bi bi-people-fill me-3"></i>Struktur Organisasi
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                Mengenal lebih dekat tim pengurus yang siap melayani dan memajukan lingkungan kita bersama
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

    <div class="struktur-content">
        <div class="container">

            <div class="row g-4">
                @forelse ($strukturs as $index => $anggota)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        <div class="member-card">
                            <!-- Position Badge -->
                            <span class="position-badge">
                                <i class="bi bi-star-fill me-1"></i>
                                {{ $anggota->jabatan }}
                            </span>

                            <!-- Member Image -->
                            <div class="member-image-wrapper">
                                <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : 'https://via.placeholder.com/400x500/667eea/ffffff?text=Pengurus' }}"
                                    alt="{{ $anggota->nama }}" class="member-image">

                                <!-- Bottom Overlay -->
                                <div class="member-overlay">
                                    <h4 class="member-name">{{ $anggota->nama }}</h4>
                                    <p class="member-position">{{ $anggota->jabatan }}</p>
                                </div>

                                <!-- Hover Info -->
                                <div class="member-info">
                                    <p class="member-quote">
                                        "Siap melayani warga dengan sepenuh hati demi kemajuan bersama."
                                    </p>
                                    <div class="member-social">
                                        <a href="#" class="social-link" title="Facebook">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                        <a href="#" class="social-link" title="Instagram">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                        <a href="#" class="social-link" title="WhatsApp">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state" data-aos="fade-up">
                            <i class="bi bi-people empty-icon"></i>
                            <p class="empty-text">Data struktur organisasi akan segera diperbarui.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endsection