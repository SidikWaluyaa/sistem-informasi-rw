<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Profil RW
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="text-center mb-4">
                        <h3 class="h4">Profil RW Belum Dibuat</h3>
                        <p class="text-muted">Silakan lengkapi form di bawah ini untuk membuat profil RW untuk pertama
                            kalinya.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Include the shared form partial --}}
                        @include('profil._form', ['profil' => new \App\Models\Profil()])
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
