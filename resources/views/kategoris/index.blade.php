<!DOCTYPE html>
<html>
@extends ('style')
<x-app-layout>
    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$title}}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- table here -->
                        <div class="search-bar">
                            <form action="/kategori/search" method="post">
                                @csrf
                                <input class="form-control mr-sm-2 " placeholder="Cari kategori menu" type="text" name="q" />
                                <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope>ID</th>
                                    <th scope>Name</th>
                                    <th scope>Description</th>
                                    <th scope>Image</th>
                                    <th scope>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $kategori->id }}</td>
                                        <td>{{ $kategori->name }}</td>
                                        <td>{{ $kategori->description }}</td>
                                        <td>
                                            <div class="container" id="boxfoto">
                                                <img class="fit-image" src="{{ asset('storage/' . $kategori->image) }}" alt="{{ $kategori->name }}" style="max-width: 100px;" />
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-success" href="/kategoris/{{$kategori->id}}/edit">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/kategoris/{{$kategori->id}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>

</html>