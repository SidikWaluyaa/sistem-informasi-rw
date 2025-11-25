@extends('layouts.public')

@section('title', $agenda->judul)

@section('content')

    <style>
        /* ============================================== */
        /*         MODERN AGENDA DETAIL STYLES           */
        /* ============================================== */

        /* Hero Section */
        .agenda-detail-hero {
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

        .agenda-detail-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
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
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 10px 20px;
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.3);
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

        /* Back Button */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 10px 24px;
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: transparent;
            transform: translateX(-5px);
        }

        .btn-back i {
            transition: transform 0.3s ease;
        }

        .btn-back:hover i {
            transform: translateX(-5px);
        }

        /* Detail Card */
        .detail-card {
            background: white;
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #23a6d5);
        }

        .detail-icon {
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

        .detail-section-title {
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

        .detail-section-title i {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .detail-content {
            font-size: 1.15rem;
            line-height: 1.9;
            color: #4a5568;
            white-space: pre-wrap;
        }

        /* Related Agenda */
        .related-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-top: 3rem;
        }

        .related-title {
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

        .related-title i {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .related-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 0.75rem;
            border: 1px solid #e2e8f0;
            gap: 1rem;
        }

        .related-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border-color: #667eea;
            transform: translateX(8px);
        }

        .related-item-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #2d3748;
            flex-grow: 1;
        }

        .related-item-date {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 6px 16px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #667eea;
            white-space: nowrap;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .agenda-detail-hero {
                min-height: 50vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .detail-content-area {
                padding: 3rem 0;
            }

            .detail-card {
                padding: 2rem 1.5rem;
            }

            .related-section {
                padding: 2rem 1.5rem;
            }

            .hero-meta {
                gap: 1rem;
                font-size: 1rem;
            }

            .hero-meta-item {
                padding: 8px 16px;
            }

            .related-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .related-item-date {
                align-self: flex-start;
            }
        }

        @media (max-width: 576px) {
            .detail-icon {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }

            .detail-section-title {
                font-size: 1.3rem;
            }

            .detail-content {
                font-size: 1.05rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="agenda-detail-hero">
        <div class="container hero-content-detail">
            <h1 class="hero-title-detail" data-aos="fade-up">
                {{ $agenda->judul }}
            </h1>
            <div class="hero-meta" data-aos="fade-up" data-aos-delay="100">
                <div class="hero-meta-item">
                    <i class="bi bi-calendar3"></i>
                    <span>{{ \Carbon\Carbon::parse($agenda->tanggal)->isoFormat('D MMMM YYYY') }}</span>
                </div>
                <div class="hero-meta-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>{{ $agenda->lokasi ?? 'Akan diinformasikan' }}</span>
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
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <!-- Back Button -->
                    <a href="{{ route('warga.agenda.index') }}" class="btn-back" data-aos="fade-right">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Daftar Agenda
                    </a>

                    <!-- Detail Card -->
                    <div class="detail-card" data-aos="fade-up">
                        <div class="text-center">
                            <div class="detail-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                        </div>

                        <h3 class="detail-section-title">
                            <i class="bi bi-info-circle-fill"></i>
                            Detail Kegiatan
                        </h3>

                        <div class="detail-content">
                            {{ $agenda->deskripsi ?? 'Detail kegiatan belum tersedia.' }}
                        </div>
                    </div>

                    <!-- Related Agenda -->
                    @if ($agendaLain->isNotEmpty())
                        <div class="related-section" data-aos="fade-up" data-aos-delay="100">
                            <h4 class="related-title">
                                <i class="bi bi-calendar-check"></i>
                                Agenda Lainnya
                            </h4>

                            @foreach ($agendaLain as $item)
                                <a href="{{ route('warga.agenda.show', $item->id) }}" class="related-item">
                                    <span class="related-item-title">{{ $item->judul }}</span>
                                    <span class="related-item-date">
                                        <i class="bi bi-calendar3"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMM Y') }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection