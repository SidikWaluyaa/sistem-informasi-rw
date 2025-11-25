@extends('layouts.public')

@section('title', 'Jadwal Agenda Warga')

@section('content')

    <style>
        /* ============================================== */
        /*           MODERN AGENDA INDEX STYLES          */
        /* ============================================== */

        /* Hero Section */
        .agenda-hero {
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

        .agenda-hero::before {
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
        .agenda-content {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* Timeline */
        .timeline-modern {
            position: relative;
            padding: 2rem 0;
            max-width: 900px;
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

        .timeline-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .timeline-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .timeline-card:hover::before {
            transform: scaleX(1);
        }

        .timeline-card:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.2);
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

        .timeline-date i {
            margin-right: 0.5rem;
        }

        .timeline-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .timeline-location {
            color: #718096;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .timeline-item:nth-child(odd) .timeline-location {
            justify-content: flex-end;
        }

        .timeline-desc {
            color: #4a5568;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .btn-detail {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 10px 24px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-detail:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-detail i {
            transition: transform 0.3s ease;
        }

        .btn-detail:hover i {
            transform: translateX(5px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
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

        /* Responsive */
        @media (max-width: 768px) {
            .agenda-hero {
                min-height: 40vh;
                padding: 100px 15px 60px;
            }

            .wave-separator svg {
                height: 50px;
            }

            .agenda-content {
                padding: 3rem 0;
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

            .timeline-card {
                padding: 1.5rem;
            }

            .timeline-title {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .empty-state {
                padding: 3rem 1.5rem;
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
    <section class="agenda-hero">
        <div class="container hero-content">
            <h1 class="hero-title" data-aos="fade-up">
                <i class="bi bi-calendar-event me-3"></i>Jadwal Agenda
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                Informasi kegiatan dan acara yang akan diselenggarakan di lingkungan kita
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

    <div class="agenda-content">
        <div class="container">

            @if ($agendas->isNotEmpty())
                <div class="timeline-modern">
                    @foreach ($agendas as $index => $agenda)
                        <div class="timeline-item" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card">
                                <span class="timeline-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($agenda->tanggal)->isoFormat('dddd, D MMMM YYYY') }}
                                </span>
                                <h3 class="timeline-title">{{ $agenda->judul }}</h3>
                                <div class="timeline-location">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>{{ $agenda->lokasi ?? 'Lokasi akan diinformasikan' }}</span>
                                </div>
                                <p class="timeline-desc">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 180) }}
                                </p>
                                <a href="{{ route('warga.agenda.show', $agenda->id) }}" class="btn-detail">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($agendas->hasPages())
                    <div class="pagination-wrapper" data-aos="fade-up">
                        {{ $agendas->links() }}
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="empty-state" data-aos="fade-up">
                    <i class="bi bi-calendar2-x empty-icon"></i>
                    <h4 class="empty-title">Belum Ada Agenda Terjadwal</h4>
                    <p class="empty-text">Saat ini belum ada kegiatan baru yang akan datang. Silakan periksa kembali halaman ini
                        nanti.</p>
                </div>
            @endif

        </div>
    </div>

@endsection