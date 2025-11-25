<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Berita
        </h2>
    </x-slot>

    <style>
        /* Modern Show Berita Styles */
        .show-container {
            padding: 2rem 0;
        }

        .detail-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
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

        .detail-image {
            position: relative;
            height: 350px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .detail-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .detail-card:hover .detail-image img {
            transform: scale(1.12);
        }

        .detail-content {
            padding: 2rem 2rem 1.5rem;
        }

        .detail-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .detail-meta {
            font-size: 0.9rem;
            color: #718096;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .detail-meta i {
            color: #667eea;
            margin-right: 0.3rem;
        }

        .detail-body {
            line-height: 1.8;
            color: #2d3748;
            white-space: pre-wrap;
        }

        .action-buttons {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .btn-modern {
            flex: 1;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-back {
            background: #e2e8f0;
            color: #4a5568;
        }

        .btn-back:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-3px);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .detail-image {
                height: 220px;
            }

            .detail-title {
                font-size: 1.5rem;
            }

            .detail-content {
                padding: 1.5rem 1rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
            }
        }

        .dark .detail-card {
            background: #1f2937;
        }

        .dark .detail-title,
        .dark .detail-body {
            color: #f9fafb;
        }

        .dark .detail-meta {
            color: #9ca3af;
        }

        .dark .btn-back {
            background: #374151;
            color: #f9fafb;
        }

        .dark .btn-back:hover {
            background: #4b5563;
        }
    </style>

    <div class="show-container">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="detail-card">
                <div class="detail-image">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100 text-white"
                            style="background: rgba(0,0,0,0.2);">
                            <i class="bi bi-image" style="font-size:4rem;"></i>
                        </div>
                    @endif
                </div>
                <div class="detail-content">
                    <h1 class="detail-title">{{ $berita->judul }}</h1>
                    <div class="detail-meta">
                        <span><i
                                class="bi bi-calendar3"></i>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</span>
                        <span><i class="bi bi-person"></i>{{ $berita->penulis ?? 'Admin' }}</span>
                    </div>
                    <div class="detail-body">
                        {{ $berita->isi }}
                    </div>
                    <div class="action-buttons">
                        <a href="{{ route('admin.berita.index') }}" class="btn-modern btn-back"><i
                                class="bi bi-arrow-left"></i>Kembali</a>
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn-modern btn-edit"><i
                                class="bi bi-pencil-square"></i>Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST"
                            onsubmit="return confirm('Hapus berita ini secara permanen?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-modern btn-delete"><i
                                    class="bi bi-trash-fill"></i>Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>