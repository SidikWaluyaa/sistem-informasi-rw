<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit User</h2>
    </x-slot>

    <div class="py-6 max-w-lg">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label>Password (kosongkan jika tidak ingin diubah)</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label>Role</label>
                <select name="role" class="w-full border rounded px-3 py-2" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </form>
    </div>
</x-app-layout>
