@extends('layouts.public')

@section('title', 'Galeri Kegiatan RW')

@section('content')

    <style>
        /* ============================================== */
        /*           MODERN GALERI STYLES                */
        /* ============================================== */

        /* Hero Section */
        .galeri-hero {
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

        .galeri-hero::before {
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
        .galeri-content {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* Gallery Grid - Masonry Style */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            grid-auto-flow: dense;
        }

        /* Gallery Item */
        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: white;
            aspect-ratio: 1;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            z-index: 3;
        }

        .gallery-item:hover::before {
            transform: scaleX(1);
        }

        .gallery-item:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
        }

        /* Make some items taller for variety */
        .gallery-item:nth-child(3n+1) {
            aspect-ratio: 4/5;
        }

        .gallery-item:nth-child(5n+2) {
            aspect-ratio: 1/1;
        }

        .gallery-item-link {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            position: relative;
        }

        .gallery-image-wrapper {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.15) rotate(2deg);
        }

        /* Gallery Overlay */
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 50%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.5rem;
            color: white;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.95), rgba(118, 75, 162, 0.95));
        }

        .gallery-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.3;
            transform: translateY(20px);
            transition: transform 0.4s ease 0.1s;
        }

        .gallery-item:hover .gallery-title {
            transform: translateY(0);
        }

        .gallery-date {
            font-size: 0.9rem;
            opacity: 0.9;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transform: translateY(20px);
            transition: transform 0.4s ease 0.15s;
        }

        .gallery-item:hover .gallery-date {
            transform: translateY(0);
        }

        /* Zoom Icon */
        .zoom-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #667eea;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .gallery-item:hover .zoom-icon {
            transform: translate(-50%, -50%) scale(1);
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

        .empty-title {
            font-size: 2rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .empty-text {
            font-size: 1.2rem;
            color: #718096;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .pagination {
            gap: 0.5rem;
        }

        .page-link {
            border-radius: 10px;
            border: none;
            padding: 10px 18px;
            color: #667eea;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
        }

        /* Loading Animation */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }

            100% {
                background-position: 1000px 0;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .galeri-hero {
                min-height: 40vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .galeri-content {
                padding: 3rem 0;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            /* Reset aspect ratios for mobile */
            .gallery-item,
            .gallery-item:nth-child(3n+1),
            .gallery-item:nth-child(5n+2) {
                aspect-ratio: 1;
            }

            .gallery-overlay {
                padding: 1rem;
            }

            .gallery-title {
                font-size: 1.1rem;
            }

            .gallery-date {
                font-size: 0.85rem;
            }

            .zoom-icon {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .empty-state {
                padding: 3rem 1rem;
            }

            .empty-icon {
                font-size: 4rem;
            }

            .empty-title {
                font-size: 1.5rem;
            }

            .empty-text {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="galeri-hero">
        <div class="container hero-content">
            <h1 class="hero-title" data-aos="fade-up">
                <i class="bi bi-images me-3"></i>Galeri Kegiatan
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                Kumpulan momen berharga dari berbagai kegiatan yang telah kita selenggarakan bersama
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

    <div class="galeri-content">
        <div class="container">

            @if ($galeris->isNotEmpty())
                <div class="gallery-grid">
                    @foreach ($galeris as $index => $foto)
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ ($index % 6) * 50 }}">
                            <a href="{{ asset('storage/' . $foto->foto) }}" data-bs-toggle="lightbox" data-gallery="gallery-rw"
                                data-title="{{ $foto->judul }}" data-footer="{{ $foto->deskripsi ?? '' }}"
                                class="gallery-item-link">

                                <div class="gallery-image-wrapper">
                                    <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->judul }}" class="gallery-image">
                                </div>

                                <!-- Zoom Icon -->
                                <div class="zoom-icon">
                                    <i class="bi bi-zoom-in"></i>
                                </div>

                                <!-- Overlay -->
                                <div class="gallery-overlay">
                                    <h5 class="gallery-title">{{ $foto->judul }}</h5>
                                    <div class="gallery-date">
                                        <i class="bi bi-calendar3"></i>
                                        <span>{{ $foto->created_at->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                @if($galeris->hasPages())
                    <div class="pagination-wrapper" data-aos="fade-up">
                        {{ $galeris->links() }}
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="empty-state" data-aos="fade-up">
                    <i class="bi bi-camera-reels empty-icon"></i>
                    <h4 class="empty-title">Galeri Masih Kosong</h4>
                    <p class="empty-text">Saat ini belum ada foto kegiatan yang diunggah. Silakan periksa kembali nanti.</p>
                </div>
            @endif

        </div>
    </div>

@endsection