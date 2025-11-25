<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Anggota: {{ $struktur->nama }}
        </h2>
    </x-slot>

    <style>
        /* Modern Show Member Styles */
        .show-container {
            padding: 2rem 0;
        }

        .detail-card {
            background: white;
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out;
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

        .detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #23a6d5);
        }

        .photo-wrapper {
            width: 200px;
            height: 200px;
            margin: 0 auto 2rem;
            border-radius: 50%;
            overflow: hidden;
            border: 6px solid #f8f9fa;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .photo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-photo-circle {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: white;
        }

        .member-name {
            font-size: 2.5rem;
            font-weight: 900;
            color: #2d3748;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .member-position-badge {
            display: inline-block;
            padding: 12px 32px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 25px;
            font-size: 1.25rem;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            margin-bottom: 2rem;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 2.5rem 0;
            border: none;
        }

        .actions-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .btn-modern {
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-back {
            background: #e2e8f0;
            color: #4a5568;
        }

        .btn-back:hover {
            background: #cbd5e0;
            transform: translateX(-5px);
            color: #4a5568;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .action-buttons {
            display: flex;
            gap: 0.75rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .detail-card {
                padding: 2rem 1.5rem;
            }

            .photo-wrapper {
                width: 150px;
                height: 150px;
            }

            .member-name {
                font-size: 2rem;
            }

            .member-position-badge {
                font-size: 1.1rem;
                padding: 10px 24px;
            }

            .actions-section {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }

            .action-buttons {
                width: 100%;
                flex-direction: column;
            }
        }

        /* Dark mode */
        .dark .detail-card {
            background: #1f2937;
        }

        .dark .member-name {
            color: #f9fafb;
        }

        .dark .btn-back {
            background: #374151;
            color: #f9fafb;
        }

        .dark .btn-back:hover {
            background: #4b5563;
            color: #f9fafb;
        }
    </style>

    <div class="show-container">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="detail-card">
                <article class="text-center">
                    <div class="photo-wrapper">
                        @if ($struktur->foto)
                            <img src="{{ asset('storage/' . $struktur->foto) }}" alt="Foto {{ $struktur->nama }}">
                        @else
                            <div class="no-photo-circle">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        @endif
                    </div>

                    <h2 class="member-name">{{ $struktur->nama }}</h2>
                    <span class="member-position-badge">
                        <i class="bi bi-star-fill me-2"></i>
                        {{ $struktur->jabatan }}
                    </span>

                    <hr class="divider">

                    <div class="actions-section">
                        <a href="{{ route('admin.struktur.index') }}" class="btn-modern btn-back">
                            <i class="bi bi-arrow-left"></i>
                            Kembali ke Daftar
                        </a>
                        <div class="action-buttons">
                            <a href="{{ route('admin.struktur.edit', $struktur->id) }}" class="btn-modern btn-edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            <form action="{{ route('admin.struktur.destroy', $struktur->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-modern btn-delete">
                                    <i class="bi bi-trash-fill"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</x-app-layout>