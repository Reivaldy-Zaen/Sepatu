@extends('templates.app')

@section('content')
    <form action="{{ route('kelola_akun.tambah.proses') }}" method="POST" class="max-w-md mx-auto p-6 bg-gray-50 rounded-lg shadow-sm">
        @csrf
        @if ($errors->any())
            <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="mb-4">
            <label for="name" class="block text-sm text-gray-800">Nama:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm text-gray-800">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm text-gray-800">Tipe Pengguna:</label>
            <select id="role" name="role" class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
                <option value="" disabled hidden {{ old('role') ? '' : 'selected' }}>Pilih</option>
                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm text-gray-800">Password:</label>
            <input type="password" id="password" name="password" class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
        </div>
        <button type="submit" class="w-full py-2.5 text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:ring-gray-300 rounded-lg">
            Kirim
        </button>
    </form>
@endsection
