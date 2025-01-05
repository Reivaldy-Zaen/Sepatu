@extends('templates.app')

@section('content')
<div class="min-h-screen bg-[#F5F5F5] py-12 px-4">
  <div class="max-w-1xl mx-auto bg-white rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-8 border border-gray-100">
      <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Tambah Sepatu Baru</h2>
      
      <form action="{{ route('barang.store') }}" method="post" class="space-y-6">
          @csrf
          @if($errors->any())
              <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm mb-6">
                  <ul class="list-disc pl-4">
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <!-- Nama Sepatu Field -->
          <div class="space-y-2">
              <label for="name" class="block text-sm font-medium text-gray-600">Nama Sepatu</label>
              <div class="flex">
                  <span class="inline-flex items-center px-3 text-gray-500 bg-gray-50 border border-e-0 border-gray-200 rounded-s-lg">
                      <!-- Shoe Icon -->
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.25C12.69 5.25 13.33 5.51 13.73 5.96C14.12 6.4 14.29 7.02 14.2 7.64C14.1 8.27 13.69 8.75 13.07 8.89L9.07 9.89C8.61 9.97 8.13 9.65 8.06 9.2C8 8.75 8.31 8.29 8.77 8.18L11.77 7.18C12.09 7.08 12.35 6.85 12.47 6.59C12.59 6.32 12.57 6.01 12.43 5.72C12.28 5.42 11.95 5.25 11.6 5.25H12Z"/>
                      </svg>
                  </span>
                  <input type="text" id="name" name="name" 
                      class="rounded-none rounded-e-lg bg-gray-50 border border-gray-200 text-gray-700 focus:ring-blue-200 focus:border-blue-300 block flex-1 min-w-0 w-full text-sm p-2.5 transition duration-150 ease-in-out placeholder-gray-400"
                      placeholder="Masukkan nama sepatu">
              </div>
          </div>

          <!-- Color Field -->
          <div class="space-y-2">
              <label for="color" class="block text-sm font-medium text-gray-600">Warna</label>
              <select id="color" name="color" 
                  class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-blue-200 focus:border-blue-300 block w-full p-2.5 transition duration-150 ease-in-out">
                  <option value="" disabled selected class="text-gray-400">Pilih warna</option>
                  <option value="White">White</option>
                  <option value="Black">Black</option>
                  <option value="Brown">Brown</option>
                  <option value="Blue">Blue</option>
                 
              </select>
          </div>

          <!-- Category Field -->
          <div class="space-y-2">
              <label for="category" class="block text-sm font-medium text-gray-600">Kategori</label>
              <select id="category" name="category" 
                  class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-blue-200 focus:border-blue-300 block w-full p-2.5 transition duration-150 ease-in-out">
                  <option value="" disabled selected class="text-gray-400">Pilih kategori</option>
                  <option value="Olahraga">Olahraga</option>
                  <option value="Santai">Santai</option>
                
              </select>
          </div>

          <!-- Type Field -->
          <div class="space-y-2">
              <label for="type" class="block text-sm font-medium text-gray-600">Sepatu</label>
              <select id="type" name="type" 
                  class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-blue-200 focus:border-blue-300 block w-full p-2.5 transition duration-150 ease-in-out">
                  <option value="" disabled selected class="text-gray-600">Pilih tipe</option>
                  <option value="Running">Running</option>
                  <option value="Futsal">Futsal</option>
                  <option value="Sneakers">Sneaker</option>
                  <option value="Canvas">Canvas</option>
              </select>
          </div>

          <!-- Size Field -->
          <div class="space-y-2">
              <label for="size" class="block text-sm font-medium text-gray-600">Ukuran Sepatu</label>
              <div class="flex">
                  <span class="inline-flex items-center px-3 text-gray-500 bg-gray-50 border border-e-0 border-gray-200 rounded-s-lg">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                      </svg>
                  </span>
                  <input type="number" id="size" name="size" 
                      class="rounded-none rounded-e-lg bg-gray-50 border border-gray-200 text-gray-700 focus:ring-blue-200 focus:border-blue-300 block flex-1 min-w-0 w-full text-sm p-2.5 transition duration-150 ease-in-out placeholder-gray-400"
                      placeholder="Masukkan ukuran">
              </div>
          </div>

          <!-- Submit Button -->
          <div class="pt-4">
              <button type="submit" 
                  class="w-full bg-gray-700 text-white font-medium rounded-lg text-sm px-5 py-3 text-center hover:bg-blue-600 focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-150 ease-in-out transform hover:-translate-y-0.5 shadow-lg shadow-blue-200">
                  Tambah Sepatu
              </button>
          </div>
      </form>
  </div>
</div>
@endsection
