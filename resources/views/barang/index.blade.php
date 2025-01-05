@extends('templates.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800">Daftar Sepatu</h2>
            <a href="{{ route('barang.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-700 via-gray-900 to-black text-white font-medium rounded-lg text-sm transition-all duration-200 ease-in-out transform hover:scale-105">
               Tambah Sepatu
            </a>
        </div>

        <!-- Search Form -->
        <form class="flex items-center space-x-3 mb-6" action="{{ route('barang.index') }}" method="GET">
            {{-- Form pencarian akun --}}
            <input type="text" name="cari" placeholder="Cari Sepatu..."
                class="input input-bordered w-72 px-4 py-2 rounded-lg bg-gray-200 border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
            <button type="submit"
                class="text-white bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 transition-all duration-200">
                Cari
            </button>
            <a href="{{ route('barang.create') }}"
                class="text-gray-700 bg-gradient-to-r from-gray-300 to-gray-500 hover:from-gray-400 hover:to-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Tambah Sepatu +
            </a>
        </form>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Nama Sepatu</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Color</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Category</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Type</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Size</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Stock Barang dari Pabrik</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4 text-gray-600">{{ $item->color }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->category }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->type }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->size }}</td>
                            <td class="px-6 py-4">
                                <select name="stock[{{ $item->id }}]" id="stock-{{ $item->id }}"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-2 focus:ring-gray-300 focus:border-gray-400 block p-2.5 transition-all duration-200">
                                    @foreach ($gudang as $gudangItem)
                                        <option value="{{ $gudangItem->id }}" {{ $gudangItem->id == $item->pabrik_id ? 'selected' : '' }}>
                                            {{ $gudangItem->name }} - Stock: {{ $gudangItem->stock }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-3">
                                    <a href="{{ route('barang.edit', $item->id) }}" 
                                       class="text-blue-500 hover:text-blue-700 font-medium transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('barang.destroy', $item['id']) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
