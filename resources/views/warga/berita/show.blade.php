@extends('layouts.public')

@section('title', $berita->judul)

@section('content')

    <style>
        /* ============================================== */
        /*         MODERN BERITA DETAIL STYLES           */
        /* ============================================== */

        /* Hero Section with Image */
        .berita-detail-hero {
            position: relative;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            padding: 120px 20px 80px;
        }

        .berita-detail-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.6) 100%);
        }

        .hero-content-detail {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
            max-width: 900px;
        }

        .hero-title-detail {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            line-height: 1.3;
            animation: fadeInUp 1s ease-out;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            font-size: 1.1rem;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.2s backwards;
        }

        .hero-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .hero-meta-item i {
            font-size: 1.3rem;
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

        /* Content Area */
        .detail-content-area {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* Article Content */
        .article-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .article-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, #667eea, #764ba2);
        }

        .article-content {
            font-size: 1.15rem;
            line-height: 1.9;
            color: #4a5568;
            white-space: pre-wrap;
        }

        /* Share Section */
        .share-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .share-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .share-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .share-title i {
            font-size: 1.8rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .share-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .share-btn-facebook {
            color: #1877f2;
            border-color: #1877f2;
        }

        .share-btn-facebook:hover {
            background: #1877f2;
            color: white;
        }

        .share-btn-twitter {
            color: #000;
            border-color: #000;
        }

        .share-btn-twitter:hover {
            background: #000;
            color: white;
        }

        .share-btn-whatsapp {
            color: #25d366;
            border-color: #25d366;
        }

        .share-btn-whatsapp:hover {
            background: #25d366;
            color: white;
        }

        /* Sidebar */
        .sidebar-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 100px;
        }

        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-title i {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .related-item {
            display: block;
            padding: 1rem;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 0.75rem;
            border: 1px solid #e2e8f0;
        }

        .related-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border-color: #667eea;
            transform: translateX(8px);
        }

        .related-item-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-item-date {
            font-size: 0.85rem;
            color: #718096;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .empty-related {
            text-align: center;
            padding: 2rem 1rem;
            color: #718096;
        }

        .empty-related i {
            font-size: 3rem;
            opacity: 0.3;
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .berita-detail-hero {
                min-height: 60vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .detail-content-area {
                padding: 3rem 0;
            }

            .article-card {
                padding: 2rem 1.5rem;
            }

            .share-section {
                padding: 2rem 1.5rem;
            }

            .sidebar-card {
                position: static;
                margin-top: 2rem;
            }

            .hero-meta {
                gap: 1rem;
                font-size: 1rem;
            }

            .share-buttons {
                flex-direction: column;
            }

            .share-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="berita-detail-hero"
        style="background-image: url('{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://via.placeholder.com/1600x900/667eea/ffffff?text=Berita' }}');">
        <div class="container hero-content-detail">
            <h1 class="hero-title-detail" data-aos="fade-up">
                {{ $berita->judul }}
            </h1>
            <div class="hero-meta" data-aos="fade-up" data-aos-delay="100">
                <div class="hero-meta-item">
                    <i class="bi bi-calendar3"></i>
                    <span>{{ $berita->created_at->isoFormat('D MMMM YYYY') }}</span>
                </div>
                <div class="hero-meta-item">
                    <i class="bi bi-clock"></i>
                    <span>{{ $berita->created_at->diffForHumans() }}</span>
                </div>
            </div>
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

    <div class="detail-content-area">
        <div class="container">
            <div class="row g-4">

                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Article Content -->
                    <div class="article-card" data-aos="fade-up">
                        <article class="article-content">
                            {!! nl2br(e($berita->isi)) !!}
                        </article>
                    </div>

                    <!-- Share Section -->
                    <div class="share-section" data-aos="fade-up">
                        <h5 class="share-title">
                            <i class="bi bi-share-fill"></i>
                            Bagikan Berita Ini
                        </h5>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
                                class="share-btn share-btn-facebook">
                                <i class="bi bi-facebook"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($berita->judul) }}"
                                target="_blank" class="share-btn share-btn-twitter">
                                <i class="bi bi-twitter-x"></i>
                                Twitter
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}"
                                target="_blank" class="share-btn share-btn-whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar-card" data-aos="fade-left">
                        <h4 class="sidebar-title">
                            <i class="bi bi-newspaper"></i>
                            Baca Juga
                        </h4>

                        @forelse ($beritaLain as $item)
                            <a href="{{ route('warga.berita.show', $item->id) }}" class="related-item">
                                <h6 class="related-item-title">{{ $item->judul }}</h6>
                                <div class="related-item-date">
                                    <i class="bi bi-clock"></i>
                                    {{ $item->created_at->diffForHumans() }}
                                </div>
                            </a>
                        @empty
                            <div class="empty-related">
                                <i class="bi bi-inbox"></i>
                                <p class="mb-0">Tidak ada berita lainnya.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection