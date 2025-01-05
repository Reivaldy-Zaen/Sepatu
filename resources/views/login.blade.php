@extends('templates.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-5 lg:px-7">
        <div class="flex w-full max-w-5xl bg-white rounded-2xl overflow-hidden">
            <!-- Left side - Login Form -->
            <div class="w-full md:w-1/2 p-8 lg:p-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-2">PT WIKRAMA JAYA</h2>
                    <img src="{{ asset('images/wikrama-logo.png') }}" alt="Logo" class="mx-auto w-32 h-auto mb-6">
                    <p class="text-gray-600">Welcome back! Please login to your account.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    @if (Session::get('failed'))
                        <div class="bg-gray-100 text-gray-700 px-4 py-3 rounded-lg text-sm">
                            {{ Session::get('failed') }}
                        </div>
                    @endif
                    @if (Session::get('logout'))
                        <div class="bg-gray-100 text-gray-700 px-4 py-3 rounded-lg text-sm">
                            {{ Session::get('logout') }}
                        </div>
                    @endif
                    @if (Session::get('canAccess'))
                        <div class="bg-gray-100 text-gray-700 px-4 py-3 rounded-lg text-sm">
                            {{ Session::get('canAccess') }}
                        </div>
                    @endif

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-gray-500 focus:border-gray-500 sm:text-sm transition duration-150 ease-in-out"
                                placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input type="password" name="password" id="password"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm transition duration-150 ease-in-out"
                                placeholder="Enter your password" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-gray-800 text-white font-semibold text-sm rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                        Login
                    </button>
                </form>
            </div>

            <!-- Right side - Image -->
            <div class="hidden md:block w-1/2 bg-cover bg-center">
                <div class="h-full w-full bg-gray-800 bg-opacity-40 flex items-center justify-center rounded-lg">
                    <div class="text-center px-8">
                        <h3 class="text-white text-3xl font-bold mb-4">Welcome to PT Wikrama Jaya</h3>
                        <p class="text-white text-lg">Selamat Datang di Sistem Manajemen Gudang PT Wikrama Jaya
                            Kami siap membantu Anda mengelola penyimpanan dan distribusi sepatu dengan efisiensi tinggi. Silakan masuk untuk melanjutkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
