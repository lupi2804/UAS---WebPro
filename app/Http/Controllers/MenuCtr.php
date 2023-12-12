<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuCtr extends Controller
{
    public function menu()
    {
        $kategoris = Kategori::all();
        $title = "INDEX";
        $image = $kategoris->map(function ($kategori) {
        return Storage::url($kategori->image);
    });
        return view('main.menu', ['kategoris' => $kategoris, 'title' => $title, 'image' => $image]);
    }

    public function index()
    {
        $kategoris =Kategori::all();
        $title = "INDEX";
        $image = $kategoris->map(function ($kategori) {
        return Storage::url($kategori->image);
    });

    return view('kategoris.index', ['kategoris' => $kategoris, 'title' => $title, 'image' => $image]);
    }


    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->storePublic('image', 'public');

        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect('/kategoris')->with('success', 'Kategori created successfully!');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $image = Storage::url($kategori->image);
        return view('kategoris.show', ['kategori' => $kategori, 'image' => $image]);
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
            return view('kategoris.edit', ['kategoris'=>$kategori]);
    }

    public function search(Request $request)
    {
        //
        $title = "Search Results";
        $query = $request->input('q');
        $kategoris = Kategori::where('title', 'like', "%$query%")->get();
        return view('kategoris.search', compact('title', 'kategoris', 'query'));
    }

    public function mainsearch(Request $request)
    {
        //
        $title = "Search Results";
        $query = $request->input('q');
        $kategoris = kategori::where('title', 'like', "%$query%")->get();
        return view('main.search', compact('title', 'kategoris', 'query'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kategori = Kategori::find($id);

        $kategori->name = $request->name;
        $kategori->description = $request->description;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (file_exists(storage_path("app/public/{$kategori->image}"))) {
                unlink(storage_path("app/public/{$kategori->image}"));
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->storePublic('image', 'public');
            $kategori->image = $imagePath;
        }

        $kategori->save();

        return redirect('/kategoris')->with('success', 'Kategori updated successfully!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategoris')->with('success', 'Kategori deleted successfully!');
    }

public function user()
{
    return $this->belongsTo(User::class);
}

}
    
