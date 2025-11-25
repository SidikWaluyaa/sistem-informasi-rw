<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Profil RW
        </h2>
    </x-slot>

    <style>
        /* Modern Edit Form Styles */
        .edit-container {
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

        .form-section-title {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-section-title i {
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

        textarea.form-control-modern {
            resize: vertical;
            min-height: 100px;
        }

        .file-input-wrapper {
            position: relative;
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
        }

        .current-logo {
            margin-top: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 12px;
            display: inline-block;
        }

        .current-logo img {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 2.5rem 0;
            border: none;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid #e2e8f0;
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
        }

        .btn-cancel:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
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

        /* Dark mode support */
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

        .dark .current-logo {
            background: #374151;
        }

        .dark .section-divider {
            background: linear-gradient(90deg, transparent, #374151, transparent);
        }

        .dark .form-actions {
            border-top-color: #374151;
        }
    </style>

    <div class="edit-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-card">
                            <!-- Basic Information Section -->
                            <h3 class="form-section-title">
                                <i class="bi bi-info-circle-fill"></i>
                                Informasi Dasar
                            </h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label for="nama_rw" class="form-label-modern">
                                            Nama RW
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control-modern" id="nama_rw" name="nama_rw"
                                            value="{{ old('nama_rw', $profil->nama_rw) }}" required
                                            placeholder="Contoh: RW 01">
                                    </div>

                                    <div class="form-group-modern">
                                        <label for="ketua_rw" class="form-label-modern">
                                            Nama Ketua RW
                                        </label>
                                        <input type="text" class="form-control-modern" id="ketua_rw" name="ketua_rw"
                                            value="{{ old('ketua_rw', $profil->ketua_rw) }}"
                                            placeholder="Nama lengkap ketua RW">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label for="kontak" class="form-label-modern">
                                            Kontak (Telepon/Email)
                                        </label>
                                        <input type="text" class="form-control-modern" id="kontak" name="kontak"
                                            value="{{ old('kontak', $profil->kontak) }}"
                                            placeholder="Contoh: 08123456789 atau email@rw.com">
                                    </div>

                                    <div class="form-group-modern">
                                        <label for="logo" class="form-label-modern">
                                            Logo RW
                                        </label>
                                        <div class="file-input-wrapper">
                                            <input class="file-input-modern form-control" type="file" id="logo"
                                                name="logo" accept="image/*">
                                            @if ($profil->logo)
                                                <div class="file-help-text">
                                                    <i class="bi bi-info-circle me-1"></i>
                                                    Kosongkan jika tidak ingin mengubah logo
                                                </div>
                                                <div class="current-logo">
                                                    <img src="{{ asset('storage/' . $profil->logo) }}" width="100"
                                                        alt="Logo saat ini">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-modern">
                                <label for="alamat" class="form-label-modern">
                                    Alamat Sekretariat
                                </label>
                                <textarea class="form-control-modern" id="alamat" name="alamat" rows="2"
                                    placeholder="Alamat lengkap sekretariat RW">{{ old('alamat', $profil->alamat) }}</textarea>
                            </div>

                            <hr class="section-divider">

                            <!-- Vision & Mission Section -->
                            <h3 class="form-section-title">
                                <i class="bi bi-bullseye"></i>
                                Visi, Misi & Sejarah
                            </h3>

                            <div class="form-group-modern">
                                <label for="visi" class="form-label-modern">
                                    Visi
                                </label>
                                <textarea class="form-control-modern" id="visi" name="visi" rows="4"
                                    placeholder="Tuliskan visi RW Anda...">{{ old('visi', $profil->visi) }}</textarea>
                            </div>

                            <div class="form-group-modern">
                                <label for="misi" class="form-label-modern">
                                    Misi
                                </label>
                                <textarea class="form-control-modern" id="misi" name="misi" rows="6"
                                    placeholder="Tuliskan misi RW Anda...">{{ old('misi', $profil->misi) }}</textarea>
                            </div>

                            <div class="form-group-modern">
                                <label for="sejarah" class="form-label-modern">
                                    Sejarah Singkat
                                </label>
                                <textarea class="form-control-modern" id="sejarah" name="sejarah" rows="6"
                                    placeholder="Tuliskan sejarah singkat RW Anda...">{{ old('sejarah', $profil->sejarah) }}</textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <a href="{{ route('admin.profil.index') }}" class="btn-modern btn-cancel">
                                    <i class="bi bi-x-circle"></i>
                                    Batal
                                </a>
                                <button type="submit" class="btn-modern btn-submit">
                                    <i class="bi bi-check-circle"></i>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>