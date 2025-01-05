@extends('templates.app')

@section('content')
<section class="bg-gradient-to-b from-gray-800 to-gray-900 text-white py-16 min-h-screen">
    <div class="w-full max-w-7xl px-4 mx-auto mb-8">
        <input 
            type="text" 
            id="search" 
            placeholder="Search for items..." 
            class="w-full p-3 text-lg text-gray-800 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
        />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl px-4 mx-auto" id="item-list">
        @foreach ($barang as $item)
            @php
                $gudangByBarang = $gudang->get($item->id) ?? [];
            @endphp
            <div class="bg-white rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 item">
                <div class="relative">
                    <!-- Decorative Element -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 transform rotate-45 translate-x-10 -translate-y-10"></div>
                    
                    <div class="p-6 relative">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <p class="text-gray-600 font-medium text-sm">{{ Auth::user()->name }}</p>
                        </div>

                        <h5 class="mb-4 text-2xl font-bold text-gray-800">{{ $item->name }}</h5>
                        
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="w-20 font-semibold">Type : </span>
                                <span class="text-gray-700">{{ $item->type }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="w-20 font-semibold">Category : </span>
                                <span class="text-gray-700">{{ $item->category }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="w-20 font-semibold">Size : </span>
                                <span class="text-gray-700">{{ $item->size }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="w-20 font-semibold">Color : </span>
                                <span class="text-gray-700">{{ $item->color }}</span>
                            </div>
                        </div>

                        <!-- Stock Selection -->
                        <div class="mt-6">
                            <label for="stock-{{ $item->id }}" class="block text-gray-700 text-sm font-medium mb-2">
                                Select Stock Location
                            </label>
                            <div class="relative">
                                <select 
                                    name="stock[{{ $item->id }}]" 
                                    id="stock-{{ $item->id }}" 
                                    class="block w-full px-4 py-3 bg-gray-400 border border-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition-all duration-200"
                                >
                                    @foreach ($gudangByBarang as $gudangItem)
                                        <option value="{{ $gudangItem->id }}">
                                            {{ $gudangItem->name }} - Stock: {{ $gudangItem->stock }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-5 h-5 text-black-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
    document.getElementById('search').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll('.item');
        
        items.forEach(item => {
            const itemName = item.querySelector('h5').textContent.toLowerCase();
            if (itemName.includes(query)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

@endsection
