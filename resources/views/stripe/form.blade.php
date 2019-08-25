@extends('layouts.app')

@section('content')
    <div class="container py-5">



        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4">Save Card</h1>
            </div>
        </div>
        <!-- End -->


        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <!-- End -->


                    <!-- Credit card form content -->
                    <div class="tab-content">

                        <!-- credit card info-->
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <form role="form" method="POST" action="{{route('save.customer')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Full name (on the card)</label>
                                    <input type="text" name="name" placeholder="Jason Doe" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cardNumber">Card number</label>
                                    <div class="input-group">
                                        <input type="text" name="cc_number" placeholder="Your card number" class="form-control" required>
                                        <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-amex mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Expiration</span></label>
                                            <div class="input-group">
                                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;"  placeholder="MM" name="month" class="form-control" required>
                                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" placeholder="YYYY" name="year" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4">
                                            <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                                            <input type="text" name="cvv" required class="form-control">
                                        </div>
                                    </div>



                                </div>
                                <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm  </button>
                            </form>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>
@endsection