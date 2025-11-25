<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profil RW
        </h2>
    </x-slot>

    <style>
        /* Modern Admin Profil Styles */
        .profil-container {
            padding: 2rem 0;
        }

        .alert-modern {
            border-radius: 15px;
            border: none;
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-left: 4px solid #667eea;
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .header-title {
            font-size: 1.75rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }

        .btn-edit-modern {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 12px 24px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-edit-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
            color: white;
        }

        /* Logo Card */
        .logo-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .logo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .logo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.15);
        }

        .logo-wrapper {
            width: 150px;
            height: 150px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid #f8f9fa;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .logo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .logo-card:hover .logo-wrapper img {
            transform: scale(1.1);
        }

        .rw-name {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            color: #718096;
            font-size: 0.95rem;
        }

        .info-item i {
            color: #667eea;
            font-size: 1.1rem;
        }

        .address-footer {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f8f9fa;
            color: #718096;
            font-size: 0.9rem;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, #667eea, #764ba2);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-content {
            color: #4a5568;
            line-height: 1.8;
            white-space: pre-wrap;
            font-size: 1.05rem;
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 2rem 0;
            border: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .btn-edit-modern {
                width: 100%;
                justify-content: center;
            }

            .content-card {
                padding: 1.5rem;
            }

            .logo-card {
                padding: 1.5rem;
            }
        }

        /* Dark mode support */
        .dark .logo-card,
        .dark .content-card {
            background: #1f2937;
        }

        .dark .rw-name {
            color: #f9fafb;
        }

        .dark .section-content {
            color: #d1d5db;
        }

        .dark .info-item {
            color: #9ca3af;
        }

        .dark .address-footer {
            color: #9ca3af;
            border-top-color: #374151;
        }

        .dark .section-divider {
            background: linear-gradient(90deg, transparent, #374151, transparent);
        }
    </style>

    <div class="profil-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="alert-modern">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color: #667eea; font-size: 1.5rem;"></i>
                                <div>
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="header-section">
                        <h3 class="header-title">
                            <i class="bi bi-building"></i> Profil RW Saat Ini
                        </h3>
                        <a href="{{ route('admin.profil.edit') }}" class="btn-edit-modern">
                            <i class="bi bi-pencil-square"></i>
                            Edit Profil
                        </a>
                    </div>

                    <div class="row">
                        {{-- Left Column: Main Info & Logo --}}
                        <div class="col-md-4">
                            <div class="logo-card">
                                @if ($profil->logo)
                                    <div class="logo-wrapper">
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo RW">
                                    </div>
                                @else
                                    <div class="logo-wrapper"
                                        style="background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-building" style="font-size: 4rem; color: white;"></i>
                                    </div>
                                @endif

                                <h4 class="rw-name">{{ $profil->nama_rw }}</h4>

                                <div class="info-item">
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>Ketua: {{ $profil->ketua_rw ?? '-' }}</span>
                                </div>

                                <div class="info-item">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>{{ $profil->kontak ?? '-' }}</span>
                                </div>

                                <div class="address-footer">
                                    <i class="bi bi-geo-alt-fill me-1"></i>
                                    {{ $profil->alamat ?? '-' }}
                                </div>
                            </div>
                        </div>

                        {{-- Right Column: Visi, Misi, Sejarah --}}
                        <div class="col-md-8">
                            <div class="content-card">
                                <h4 class="section-title">
                                    <i class="bi bi-eye-fill"></i>
                                    Visi
                                </h4>
                                <p class="section-content">{{ $profil->visi ?? 'Belum diatur.' }}</p>

                                <hr class="section-divider">

                                <h4 class="section-title">
                                    <i class="bi bi-bullseye"></i>
                                    Misi
                                </h4>
                                <p class="section-content">{{ $profil->misi ?? 'Belum diatur.' }}</p>

                                <hr class="section-divider">

                                <h4 class="section-title">
                                    <i class="bi bi-book-fill"></i>
                                    Sejarah Singkat
                                </h4>
                                <p class="section-content">{{ $profil->sejarah ?? 'Belum diatur.' }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>