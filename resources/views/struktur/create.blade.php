<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Anggota Struktur
        </h2>
    </x-slot>

    <style>
        /* Modern Create Form Styles */
        .create-container {
            padding: 2rem 0;
        }

        .alert-error-modern {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
            border-left: 4px solid #ef4444;
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

        .alert-error-modern h5 {
            color: #dc2626;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-error-modern ul {
            margin: 0;
            padding-left: 1.5rem;
            color: #991b1b;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
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

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #23a6d5);
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-title i {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-group-modern {
            margin-bottom: 1.75rem;
        }

        .form-label-modern {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-label-modern .required {
            color: #ef4444;
            margin-left: 0.25rem;
        }

        .form-control-modern {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-control-modern:hover {
            border-color: #cbd5e0;
        }

        .file-input-modern {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-modern:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .file-help-text {
            font-size: 0.85rem;
            color: #718096;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 2rem 0;
            border: none;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn-modern {
            padding: 12px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #4a5568;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
            color: #4a5568;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-card {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }
        }

        /* Dark mode */
        .dark .form-card {
            background: #1f2937;
        }

        .dark .form-label-modern {
            color: #f9fafb;
        }

        .dark .form-control-modern {
            background: #374151;
            border-color: #4b5563;
            color: #f9fafb;
        }

        .dark .form-control-modern:focus {
            border-color: #667eea;
            background: #374151;
        }

        .dark .btn-cancel {
            background: #374151;
            color: #f9fafb;
        }

        .dark .btn-cancel:hover {
            background: #4b5563;
            color: #f9fafb;
        }
    </style>

    <div class="create-container">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($errors->any())
                        <div class="alert-error-modern">
                            <h5>
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                Terjadi Kesalahan!
                            </h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-card">
                            <h3 class="form-title">
                                <i class="bi bi-person-plus-fill"></i>
                                Tambah Anggota Baru
                            </h3>

                            <div class="form-group-modern">
                                <label for="nama" class="form-label-modern">
                                    Nama Lengkap
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control-modern" id="nama" name="nama"
                                    value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="form-group-modern">
                                <label for="jabatan" class="form-label-modern">
                                    Jabatan
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control-modern" id="jabatan" name="jabatan"
                                    value="{{ old('jabatan') }}" placeholder="Contoh: Ketua RW, Sekretaris, Bendahara"
                                    required>
                            </div>

                            <div class="form-group-modern">
                                <label for="foto" class="form-label-modern">
                                    Foto (Opsional)
                                </label>
                                <input class="file-input-modern form-control" type="file" id="foto" name="foto"
                                    accept="image/*">
                                <div class="file-help-text">
                                    <i class="bi bi-info-circle"></i>
                                    Format: JPG, JPEG, PNG. Ukuran Maksimal: 2MB
                                </div>
                            </div>

                            <hr class="divider">

                            <div class="form-actions">
                                <a href="{{ route('admin.struktur.index') }}" class="btn-modern btn-cancel">
                                    <i class="bi bi-x-circle"></i>
                                    Batal
                                </a>
                                <button type="submit" class="btn-modern btn-submit">
                                    <i class="bi bi-check-circle"></i>
                                    Simpan Anggota
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>