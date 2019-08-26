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
                            <img class="card-img-top" src="{{config('app.url') . 'storage/' . $product->image}}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text"><small class="text-muted">Sold by <b>{{$product->seller->name}}</b> </small></p>
                        </div>
                        <div class="card-footer">
                            <button data-toggle="modal" data-target="#purchaseModal_{{$product->id}}" class="btn btn-primary btn-block">Buy for ${{$product->price}}</button>
                        </div>

                            <!-- Modal -->
                            <div class="modal fade" id="purchaseModal_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="purchaseModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Purchase</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to purchase {{$product->name}} from {{$product->seller->name}} for ${{$product->price}}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <form action="{{route('purchase')}}" method="POST">
                                                @csrf
                                                <input value="{{$product->upc}}" name="upc" hidden>
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    {{ $products->links() }}
@endsection