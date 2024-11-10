@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Products</h1>
    <a href="{{ route('products.create') }}" class="btn add mb-4">Add Product</a>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>${{ $product->price }}</strong></p>
                        <div class="d-flex justify-content-center gap-2">
                            <button>Buy Now</button>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .card{
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 10px;
            background-color: #F8EBDC;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            margin: 0 5px 20px 5px;
        }

        h5{
            font-weight: 700;
        }
        p{
            font-weight: 500;
            opacity: 80%;
        }

        button{
            border: none;
            background-color: #7A3015;
            padding: 8px 24px 8px 24px;
            font-size: 16px;
            color: #fff;
            border-radius: 24px;
            font-weight: 700;
        }

        img{
            width: 100%;
            height: 250px;
        }
        .add{
            margin-left: 20px;
            border: none;
            background-color: #7A3015;
            padding: 8px 24px 8px 24px;
            font-size: 16px;
            color: #fff;
            border-radius: 24px;
            font-weight: 700;
        }

        .add:hover{
            background: #7A3015;
            color: #fff;
        }
    </style>
@endsection
