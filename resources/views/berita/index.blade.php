<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Manajemen Berita</h2>
    </x-slot>

    <style>
        .berita-container{padding:2rem 0}.alert-modern{border-radius:15px;border:none;padding:1.25rem 1.5rem;margin-bottom:2rem;background:linear-gradient(135deg,rgba(16,185,129,.1),rgba(5,150,105,.1));border-left:4px solid #10b981;animation:slideInDown .5s ease-out}@keyframes slideInDown{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}.header-section{display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem;padding-bottom:1.5rem;border-bottom:2px solid #e2e8f0}.header-title{font-size:1.75rem;font-weight:800;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin:0}.btn-add-modern{display:inline-flex;align-items:center;gap:.5rem;padding:12px 24px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:12px;font-weight:600;text-decoration:none;transition:all .3s ease;box-shadow:0 4px 15px rgba(102,126,234,.3)}.btn-add-modern:hover{transform:translateY(-3px);box-shadow:0 6px 20px rgba(102,126,234,.4);color:#fff}.berita-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(350px,1fr));gap:1.5rem}.berita-card{background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,.08);transition:all .4s ease;animation:fadeInUp .6s ease-out backwards}.berita-card:nth-child(1){animation-delay:.1s}.berita-card:nth-child(2){animation-delay:.15s}.berita-card:nth-child(3){animation-delay:.2s}.berita-card:nth-child(4){animation-delay:.25s}.berita-card:nth-child(5){animation-delay:.3s}.berita-card:nth-child(6){animation-delay:.35s}@keyframes fadeInUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}.berita-card::before{content:'';position:absolute;top:0;left:0;right:0;height:5px;background:linear-gradient(90deg,#667eea,#764ba2,#f093fb);transform:scaleX(0);transition:transform .4s ease;z-index:2}.berita-card:hover::before{transform:scaleX(1)}.berita-card:hover{transform:translateY(-8px);box-shadow:0 20px 60px rgba(102,126,234,.2)}.berita-image{position:relative;height:220px;overflow:hidden;background:linear-gradient(135deg,#667eea,#764ba2)}.berita-image img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease}.berita-card:hover .berita-image img{transform:scale(1.15)}.berita-info{padding:1.5rem}.berita-title{font-size:1.25rem;font-weight:800;color:#2d3748;margin-bottom:.75rem;line-height:1.3;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.berita-excerpt{color:#718096;font-size:.95rem;line-height:1.6;margin-bottom:1.5rem;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}.berita-meta{display:flex;gap:1rem;margin-bottom:1.5rem;font-size:.85rem;color:#9ca3af}.berita-meta i{color:#667eea}.berita-actions{display:flex;gap:.5rem}.btn-action{flex:1;padding:10px;border-radius:10px;border:2px solid;font-weight:600;font-size:.9rem;cursor:pointer;transition:all .3s ease;display:inline-flex;align-items:center;justify-content:center;gap:.5rem;text-decoration:none}.btn-view{background:rgba(59,130,246,.1);color:#3b82f6;border-color:#3b82f6}.btn-view:hover{background:#3b82f6;color:#fff;transform:translateY(-2px)}.btn-edit{background:rgba(245,158,11,.1);color:#f59e0b;border-color:#f59e0b}.btn-edit:hover{background:#f59e0b;color:#fff;transform:translateY(-2px)}.btn-delete{background:rgba(239,68,68,.1);color:#ef4444;border-color:#ef4444}.btn-delete:hover{background:#ef4444;color:#fff;transform:translateY(-2px)}.empty-state{text-align:center;padding:5rem 2rem;background:#fff;border-radius:25px;box-shadow:0 10px 40px rgba(0,0,0,.08)}.empty-icon{font-size:6rem;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin-bottom:2rem;opacity:.5}.empty-title{font-size:2rem;font-weight:800;color:#2d3748;margin-bottom:1rem}.empty-text{font-size:1.2rem;color:#718096;margin-bottom:2rem}@media (max-width:768px){.header-section{flex-direction:column;gap:1rem;align-items:flex-start}.btn-add-modern{width:100%;justify-content:center}.berita-grid{grid-template-columns:1fr}.empty-state{padding:3rem 1.5rem}.empty-icon{font-size:4rem}.empty-title{font-size:1.5rem}.empty-text{font-size:1rem}}.dark .berita-card,.dark .empty-state{background:#1f2937}.dark .berita-title,.dark .empty-title{color:#f9fafb}.dark .berita-excerpt,.dark .empty-text{color:#9ca3af}.dark .header-section{border-bottom-color:#374151}
    </style>

    <div class="berita-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="alert-modern">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color:#10b981;font-size:1.5rem"></i>
                                <div><strong>Berhasil!</strong> {{session('success')}}</div>
                            </div>
                        </div>
                    @endif

                    <div class="header-section">
                        <h3 class="header-title"><i class="bi bi-newspaper"></i> Daftar Berita</h3>
                        <a href="{{route('admin.berita.create')}}" class="btn-add-modern">
                            <i class="bi bi-plus-circle-fill"></i>Tambah Berita
                        </a>
                    </div>

                    @if($beritas->count()>0)
                        <div class="berita-grid">
                            @foreach($beritas as $berita)
                                <div class="berita-card">
                                    <div class="berita-image">
                                        @if($berita->gambar)
                                            <img src="{{asset('storage/'.$berita->gambar)}}" alt="{{$berita->judul}}">
                                        @else
                                            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:#fff">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="berita-info">
                                        <h4 class="berita-title">{{$berita->judul}}</h4>
                                        <p class="berita-excerpt">{{strip_tags($berita->konten)}}</p>
                                        <div class="berita-meta">
                                            <span><i class="bi bi-calendar3 me-1"></i>{{\Carbon\Carbon::parse($berita->tanggal)->format('d M Y')}}</span>
                                            <span><i class="bi bi-person me-1"></i>{{$berita->penulis??'Admin'}}</span>
                                        </div>
                                        <div class="berita-actions">
                                            <a href="{{route('admin.berita.show',$berita)}}" class="btn-action btn-view"><i class="bi bi-eye-fill"></i></a>
                                            <a href="{{route('admin.berita.edit',$berita)}}" class="btn-action btn-edit"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{route('admin.berita.destroy',$berita)}}" method="POST" style="flex:1" onsubmit="return confirm('Hapus berita ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete" style="width:100%"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="bi bi-newspaper empty-icon"></i>
                            <h4 class="empty-title">Belum Ada Berita</h4>
                            <p class="empty-text">Mulai tambahkan berita untuk warga RW Anda</p>
                            <a href="{{route('admin.berita.create')}}" class="btn-add-modern">
                                <i class="bi bi-plus-circle-fill"></i>Tambah Berita Pertama
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
