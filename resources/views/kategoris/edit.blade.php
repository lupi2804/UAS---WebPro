<!DOCTYPE html>
<html id="createbody">
    @extends ('style')
    <body id="createbody">
        <x-app-layout>
            <br>
            <div id="createbox" class="container">
                <h2>Edit Menu</h2>
                <form action="{{ url('/kategoris/' . $kategoris->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Menu Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $kategori->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Menu Description:</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $kategori->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Menu Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                        <img src="{{ asset('storage/' . $kategoris->image) }}" alt="{{ $kategoris->name }}" style="max-width: 100px; margin-top: 10px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </x-app-layout>
    </body>
</html>   

