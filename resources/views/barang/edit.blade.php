@extends('templates.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4">
  <div class="max-w-xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-8">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Sepatu</h2>
      
      <form action="{{ route('barang.update',$barang->id) }}" method="post">
          @csrf
          @method('PATCH')
          
          @if($errors->any())
              <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                  <ul class="list-disc pl-4">
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <!-- Nama Sepatu Field -->
          <div class="mb-5">
              <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama Sepatu</label>
              <div class="flex">
                  <span class="inline-flex items-center px-3 text-gray-500 bg-gray-50 border border-e-0 border-gray-200 rounded-s-lg">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                      </svg>
                  </span>
                  <input type="text" id="name" name="name" 
                      class="rounded-none rounded-e-lg bg-gray-50 border border-gray-200 text-gray-700 focus:ring-gray-300 focus:border-gray-300 block flex-1 min-w-0 w-full text-sm p-2.5 transition duration-150 ease-in-out"
                      value="{{ $barang['name'] }}">
              </div>
          </div>

          <!-- Color Field -->
          <div class="mb-5">
              <label for="color" class="block mb-2 text-sm font-medium text-gray-700">Warna</label>
              <select id="color" name="color" 
                  class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 transition duration-150 ease-in-out">
                  <option disabled>Pilih warna</option>
                  <option value="Black" {{ $barang['color'] == 'Black' ? 'selected' : '' }}>Black</option>
                  <option value="White" {{ $barang['color'] == 'White' ? 'selected' : '' }}>White</option>
                  <option value="Blue" {{ $barang['color'] == 'Blue' ? 'selected' : '' }}>Blue</option>
                  <option value="Brown" {{ $barang['color'] == 'Brown' ? 'selected' : '' }}>Brown</option>
                  
              </select>
          </div>

          <!-- Category Field -->
          <div class="mb-5">
              <label for="category" class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
              <select id="category" name="category" 
                  class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 transition duration-150 ease-in-out">
                  <option disabled>Pilih Category</option>
                  <option value="Olahraga" {{ $barang['category'] == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                  <option value="Santai" {{ $barang['category'] == 'Santai' ? 'selected' : '' }}>Santai</option>
                  
              </select>
          </div>

          <!-- Type Field -->
          <div class="mb-5">
              <label for="type" class="block mb-2 text-sm font-medium text-gray-700">Tipe</label>
              <select id="type" name="type" 
                  class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 transition duration-150 ease-in-out">
                  <option disabled>Pilih Tipe</option>
                  <option value="Running" {{ $barang['type'] == 'Running' ? 'selected' : '' }}>Running</option>
                  <option value="Futsal" {{ $barang['type'] == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                  <option value="Sneakers" {{ $barang['type'] == 'Sneakers' ? 'selected' : '' }}>Sneaker</option>
                  <option value="Canvas" {{ $barang['type'] == 'Canvas' ? 'selected' : '' }}>Canvas</option>
              </select>
          </div>

          <!-- Size Field -->
          <div class="mb-6">
              <label for="size" class="block mb-2 text-sm font-medium text-gray-700">Ukuran Sepatu</label>
              <div class="flex">
                  <span class="inline-flex items-center px-3 text-gray-500 bg-gray-50 border border-e-0 border-gray-200 rounded-s-lg">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                      </svg>
                  </span>
                  <input type="number" id="size" name="size" 
                      class="rounded-none rounded-e-lg bg-gray-50 border border-gray-200 text-gray-700 focus:ring-gray-300 focus:border-gray-300 block flex-1 min-w-0 w-full text-sm p-2.5 transition duration-150 ease-in-out"
                      value="{{ $barang->size }}">
              </div>
          </div>

          <!-- Submit Button -->
          <button type="submit" 
              class="w-full bg-gray-800 text-white font-medium rounded-lg text-sm px-5 py-3 text-center hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:outline-none transition duration-150 ease-in-out transform hover:-translate-y-0.5">
              Simpan Perubahan
          </button>
      </form>
  </div>
</div>
      
      @endsection