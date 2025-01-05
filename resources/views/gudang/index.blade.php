@extends('templates.app')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-gray-50">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Data Gudang</h2>
            
            <form class="flex items-center space-x-3 mb-6" action="{{ route('gudang.index') }}" method="GET">
                {{-- Form pencarian akun --}}
                <input type="text" name="cari" placeholder="Cari Nama Gudang"
                class="input input-bordered w-72 px-4 py-2 rounded-lg bg-gray-200 border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <button type="submit"
                class="text-white bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 transition-all duration-200">
                Cari
            </button>
            <a href="{{ route('gudang.create') }}"
                class="bg-gray-700 hover:bg-gray-800 text-white font-medium rounded-lg text-sm px-4 py-2 transition-colors duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Data
            </a>
        </form>

        </div>

        <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium">
                        Nama Gudang
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium">
                        Nama Barang
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gudang as $item)
                    <tr class="bg-white hover:bg-gray-50 border-b transition-colors duration-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $item->name }}
                        </th>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-800 px-2.5 py-0.5 rounded-full">
                                {{ $item->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-gray-700">
                                {{ $item->barang->name ?? 'N/A' }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Empty State -->
        @if (count($gudang) == 0)
            <div class="text-center py-10">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data</h3>
                <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan data gudang baru.</p>
            </div>
        @endif
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .relative {
            animation: fadeIn 0.3s ease-out;
        }

        .hover\:bg-gray-50:hover {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection
