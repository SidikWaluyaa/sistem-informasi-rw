<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Manajemen Struktur Organisasi
        </h2>
    </x-slot>

    <style>
        /* Modern Struktur Management Styles */
        .struktur-container {
            padding: 2rem 0;
        }

        .alert-modern {
            border-radius: 15px;
            border: none;
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
            border-left: 4px solid #10b981;
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

        .btn-add-modern {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-add-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        /* Members Grid */
        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .member-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .member-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .member-card:nth-child(2) {
            animation-delay: 0.15s;
        }

        .member-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .member-card:nth-child(4) {
            animation-delay: 0.25s;
        }

        .member-card:nth-child(5) {
            animation-delay: 0.3s;
        }

        .member-card:nth-child(6) {
            animation-delay: 0.35s;
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
        }

        .member-card:hover::before {
            transform: scaleX(1);
        }

        .member-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.2);
        }

        .member-photo {
            position: relative;
            height: 280px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .member-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .member-card:hover .member-photo img {
            transform: scale(1.1);
        }

        .member-number {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #667eea;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .no-photo {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
        }

        .member-info {
            padding: 1.5rem;
        }

        .member-name {
            font-size: 1.25rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .member-position {
            color: #718096;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .member-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-view {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.1));
            color: #3b82f6;
            border: 2px solid #3b82f6;
        }

        .btn-view:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .btn-edit {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(217, 119, 6, 0.1));
            color: #f59e0b;
            border: 2px solid #f59e0b;
        }

        .btn-edit:hover {
            background: #f59e0b;
            color: white;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
            color: #ef4444;
            border: 2px solid #ef4444;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px);
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
            margin-bottom: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .btn-add-modern {
                width: 100%;
                justify-content: center;
            }

            .members-grid {
                grid-template-columns: 1fr;
            }

            .member-actions {
                flex-direction: column;
            }

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

        /* Dark mode support */
        .dark .member-card,
        .dark .empty-state {
            background: #1f2937;
        }

        .dark .member-name,
        .dark .empty-title {
            color: #f9fafb;
        }

        .dark .member-position,
        .dark .empty-text {
            color: #9ca3af;
        }

        .dark .header-section {
            border-bottom-color: #374151;
        }
    </style>

    <div class="struktur-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="alert-modern">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color: #10b981; font-size: 1.5rem;"></i>
                                <div>
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="header-section">
                        <h3 class="header-title">
                            <i class="bi bi-people-fill"></i> Daftar Pengurus
                        </h3>
                        <a href="{{ route('admin.struktur.create') }}" class="btn-add-modern">
                            <i class="bi bi-person-plus-fill"></i>
                            Tambah Anggota
                        </a>
                    </div>

                    @if($data->count() > 0)
                        <div class="members-grid">
                            @foreach ($data as $index => $struktur)
                                <div class="member-card">
                                    <div class="member-photo">
                                        <span class="member-number">{{ $index + 1 }}</span>
                                        @if ($struktur->foto)
                                            <img src="{{ asset('storage/' . $struktur->foto) }}" alt="{{ $struktur->nama }}">
                                        @else
                                            <div class="no-photo">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="member-info">
                                        <h4 class="member-name">{{ $struktur->nama }}</h4>
                                        <div class="member-position">
                                            <i class="bi bi-star-fill"></i>
                                            {{ $struktur->jabatan }}
                                        </div>
                                        <div class="member-actions">
                                            <a href="{{ route('admin.struktur.show', $struktur->id) }}"
                                                class="btn-action btn-view" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                                Lihat
                                            </a>
                                            <a href="{{ route('admin.struktur.edit', $struktur->id) }}"
                                                class="btn-action btn-edit" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.struktur.destroy', $struktur->id) }}" method="POST"
                                                style="flex: 1;"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete" style="width: 100%;"
                                                    title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="bi bi-people empty-icon"></i>
                            <h4 class="empty-title">Belum Ada Data Pengurus</h4>
                            <p class="empty-text">Mulai tambahkan anggota pengurus RW Anda</p>
                            <a href="{{ route('admin.struktur.create') }}" class="btn-add-modern">
                                <i class="bi bi-person-plus-fill"></i>
                                Tambah Anggota Pertama
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>