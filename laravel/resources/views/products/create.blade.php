@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
    </div>

    <div class="form-group">
        <label for="img">Image:</label>
        <input type="file" name="img" required>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" required>
    </div>

    <div class="form-group">
        <button type="submit" class="d-flex mx-auto">Add Product</button>
    </div>
</form>

<style>
    form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"], input[type="file"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

textarea {
    resize: vertical;
    min-height: 120px;
}

button {
    padding: 10px 20px;
    background-color: #7A3015; 
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #5c2412; 
}
</style>

@endsection
