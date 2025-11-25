@extends('layouts.public')

@section('title', 'Arsip Berita')

@section('content')

    <style>
        /* ============================================== */
        /*         MODERN BERITA INDEX STYLES            */
        /* ============================================== */

        /* Hero Section */
        .berita-hero {
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

        .berita-hero::before {
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
        .berita-content {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* News Card */
        .berita-card {
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

        .berita-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            z-index: 2;
        }

        .berita-card:hover::before {
            transform: scaleX(1);
        }

        .berita-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.2);
        }

        .berita-img-wrapper {
            position: relative;
            height: 240px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .berita-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .berita-card:hover .berita-img-wrapper img {
            transform: scale(1.15) rotate(2deg);
        }

        .berita-date-badge {
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

        .berita-body {
            padding: 1.75rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .berita-title {
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

        .berita-excerpt {
            color: #718096;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn-read-berita {
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

        .btn-read-berita:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-read-berita i {
            transition: transform 0.3s ease;
        }

        .btn-read-berita:hover i {
            transform: translateX(5px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-icon {
            font-size: 5rem;
            color: #cbd5e0;
            margin-bottom: 1.5rem;
        }

        .empty-text {
            font-size: 1.25rem;
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

        /* Responsive */
        @media (max-width: 768px) {
            .berita-hero {
                min-height: 40vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .berita-content {
                padding: 3rem 0;
            }

            .berita-img-wrapper {
                height: 200px;
            }

            .berita-body {
                padding: 1.5rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="berita-hero">
        <div class="container hero-content">
            <h1 class="hero-title" data-aos="fade-up">
                <i class="bi bi-newspaper me-3"></i>Arsip Berita
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                Semua informasi dan berita seputar lingkungan kita
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

    <div class="berita-content">
        <div class="container">

            <div class="row g-4">
                @forelse ($beritas as $index => $berita)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="berita-card">
                            <div class="berita-img-wrapper">
                                <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://via.placeholder.com/400x250/667eea/ffffff?text=Berita' }}"
                                    alt="{{ $berita->judul }}">
                                <span class="berita-date-badge">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $berita->created_at->isoFormat('D MMM Y') }}
                                </span>
                            </div>
                            <div class="berita-body">
                                <h3 class="berita-title">{{ $berita->judul }}</h3>
                                <p class="berita-excerpt">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}
                                </p>
                                <a href="{{ route('warga.berita.show', $berita->id) }}" class="btn-read-berita">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state" data-aos="fade-up">
                            <i class="bi bi-inbox empty-icon"></i>
                            <p class="empty-text">Belum ada berita yang dipublikasikan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($beritas->hasPages())
                <div class="pagination-wrapper" data-aos="fade-up">
                    {{ $beritas->links() }}
                </div>
            @endif

        </div>
    </div>

@endsection