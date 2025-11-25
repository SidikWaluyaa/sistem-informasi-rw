<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Kelola User</h2>
    </x-slot>

    <div class="py-6">
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah User</a>

        <div class="mt-4 overflow-x-auto">
            <table class="w-full border text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-3 py-2">ID</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">Email</th>
                        <th class="border px-3 py-2">Role</th>
                        <th class="border px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-3 py-2">{{ $user->id }}</td>
                            <td class="border px-3 py-2">{{ $user->name }}</td>
                            <td class="border px-3 py-2">{{ $user->email }}</td>
                            <td class="border px-3 py-2">{{ ucfirst($user->role) }}</td>
                            <td class="border px-3 py-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus user ini?')"
                                        class="text-red-600 ml-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
