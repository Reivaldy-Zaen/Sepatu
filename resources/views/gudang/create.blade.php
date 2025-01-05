@extends('templates.app')

@section('content')
<form class="max-w-lg mx-auto bg-gray-800 shadow-lg rounded-lg p-8" action="{{ route('gudang.store') }}" method="post">
    @csrf
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert">
            <strong class="font-bold">Terjadi kesalahan!</strong>
            <span class="block sm:inline">{{ implode(', ', $errors->all()) }}</span>
        </div>
    @endif
    <label for="name" class="block mb-3 text-sm font-semibold text-gray-200">Nama Perusahaan</label>
    <div class="flex mb-5">
      <span class="inline-flex items-center px-3 text-sm text-gray-600 bg-gray-700 border border-gray-600 rounded-l-lg">
        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
        </svg>
      </span>
      <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-500 focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white" >
    </div>

    <label for="barang" class="block mb-3 text-sm font-semibold text-gray-200">Nama Barang</label>
    <select id="barang" name="barang" class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-500 focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white">
        <option selected>Pilih barang</option>
        @foreach ($barang as $item)
            <option value="{{ $item->id }}" >{{ $item->name }}</option>
        @endforeach
    </select>

    <label for="stock" class="block mb-3 text-sm font-semibold text-gray-200">Stock Barang</label>
    <div class="flex mb-5">
      <span class="inline-flex items-center px-3 text-sm text-gray-600 bg-gray-700 border border-gray-600 rounded-l-lg">
        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
        </svg>
      </span>
      <input type="number" id="stock" name="stock" class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-500 focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white" >
    </div>

    <button type="submit" class="w-full py-3 px-6 bg-gradient-to-br from-gray-700 to-gray-600 hover:bg-gradient-to-bl text-white font-bold rounded-lg focus:outline-none focus:ring-4 focus:ring-gray-500">
        Tambah
    </button>
</form>
@endsection
