<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Foto: {{ $galeri->judul }}
        </h2>
    </x-slot>

    <style>
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

        .photo-container {
            margin-bottom: 2rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
        }

        .photo-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .photo-title {
            font-size: 2rem;
            font-weight: 900;
            color: #2d3748;
            margin-bottom: 1rem;
            text-align: center;
        }

        .photo-desc {
            color: #718096;
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: center;
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

        @media (max-width: 768px) {
            .detail-card {
                padding: 2rem 1.5rem;
            }

            .photo-title {
                font-size: 1.5rem;
            }

            .photo-desc {
                font-size: 1rem;
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

        .dark .detail-card {
            background: #1f2937;
        }

        .dark .photo-title {
            color: #f9fafb;
        }

        .dark .photo-desc {
            color: #9ca3af;
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
                <div class="photo-container">
                    <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}">
                </div>

                <h2 class="photo-title">{{ $galeri->judul }}</h2>

                @if($galeri->deskripsi)
                    <p class="photo-desc">{{ $galeri->deskripsi }}</p>
                @endif

                <hr class="divider">

                <div class="actions-section">
                    <a href="{{ route('admin.galeri.index') }}" class="btn-modern btn-back">
                        <i class="bi bi-arrow-left"></i>Kembali ke Galeri
                    </a>
                    <div class="action-buttons">
                        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn-modern btn-edit">
                            <i class="bi bi-pencil-square"></i>Edit
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST"
                            onsubmit="return confirm('Hapus foto ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-modern btn-delete">
                                <i class="bi bi-trash-fill"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>