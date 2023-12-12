<!DOCTYPE html>
<html>
@extends ('style')
    <body>
        <nav class="navbar fixed-top">
            <!-- Logo user -->
                <div id="logo">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                            @endauth
                        </div>
                    @endif
                </div>
            <!-- Logo user -->
            <!-- search bar -->
            <div class="search-bar">
                <form action="/main/search" method="post">
                    @csrf
                    <a id="searchbtn" class="btn btn-outline-success" href="/main/menu">Kembali ke daftar menu</a>
                </form>
            </div>
            <!-- search bar -->
        </nav>

        <div id="showkategori" class="container">
           <!-- detail menu --> 
            <div class="container">
                <strong>ID: </strong> {{ $kategori->id }}<br>
                <strong>Name: </strong> {{ $kategori->name }}<br>
                <strong>Description: </strong> {{ $kategori->description }}<br>
                <strong>Image: </strong> <img src="{{ asset('storage/' . $kategori->image) }}" alt="{{ $kategori->name }}" style="max-width: 200px;"><br>
            </div>
        </div>
    </body>
</html>
            
