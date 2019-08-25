@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Product</h1>
        <hr>
        <form action="{{route('save.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Starry Night">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input id="price" name="price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>

            <button class="btn btn-primary btn-block">Add Product</button>
        </form>
    </div>
@endsection