@extends('templates.app')

@section('content')
    <form action="{{ route('kelola_akun.tambah.proses') }}" method="POST" class="max-w-lg mx-auto bg-gray-800 shadow-xl rounded-lg p-8">
        @csrf
        @if ($errors->any())
            <div class="bg-red-200 border border-red-400 text-red-800 px-4 py-3 rounded-lg mb-4" role="alert">
                <strong class="font-bold">Terjadi kesalahan!</strong>
                <span class="block sm:inline">{{ implode(', ', $errors->all()) }}</span>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="bg-green-200 border border-green-400 text-green-800 px-4 py-3 rounded-lg mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ Session::get('success') }}</span>
            </div>
        @endif
        <div class="mb-6">
            <label for="name" class="block text-gray-300 text-sm font-semibold mb-2">Nama:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
        </div>
        <div class="mb-6">
            <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
        </div>
        <div class="mb-6">
            <label for="role" class="block text-gray-300 text-sm font-semibold mb-2">Tipe Pengguna:</label>
            <div class="relative">
                <select id="role" name="role" class="block w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                    <option selected disabled hidden>Pilih</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 pointer-events-none">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </div>
            </div>
        </div>
        <div class="mb-8">
            <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">Password:</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="w-full bg-gray-600 hover:bg-gray-500 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                Kirim
            </button>
        </div>
    </form>
@endsection
