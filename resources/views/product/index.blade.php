@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Products:</h1>
        <hr>
        <div class="row card-deck">
            @foreach($products as $product)
                <div class="col-4 my-3">
                    <div class="card h-100" style="width: 18rem;">
                        @if(is_null($product->image))
                            <img class="card-img-top" src="https://us.123rf.com/450wm/pe3check/pe3check1710/pe3check171000054/88673746-stock-vector-no-image-available-sign-internet-web-icon-to-indicate-the-absence-of-image-until-it-will-be-download.jpg?ver=6" alt="Card image cap">
                        @else
                            <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text"><small class="text-muted">Sold by <b>{{$product->seller->name}}</b> </small></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-success btn-block">Buy</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection