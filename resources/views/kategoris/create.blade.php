<!DOCTYPE html>
<html id="createbody">
    @extends('style')
    @extends('layouts.app')

@section('content')
    <div id="createbox" class="container">
        <h2>Create New Menu</h2>
        <form action="{{ url('/index') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Menu Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Menu Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Menu Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Menu</button>
        </form>
    </div>
@endsection
