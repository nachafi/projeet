@extends('site.app')
@section('title', 'Catalogue_List')

@section('content')
<section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Category Page</h2>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->
    <section class="section-content bg padding-y">
    @if (isset($products))
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-6 col-sm-12">
                <h5>{{$product->name}}</h5>
                <div class="img-wrap padding-y"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>
            
                <p>Price: {{$product->price}}</p>
            </div>
         
        @endforeach
    </div>
@endif
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= Subscribe ========================= -->
    <section class="section-subscribe bg-primary padding-y-lg">
        <div class="container">

            <p class="pb-2 text-center white">Delivering the latest product trends and industry news straight to your inbox</p>

            <div class="row justify-content-md-center">
                <div class="col-lg-4 col-sm-6">
                    <form class="row-sm form-noborder">
                        <div class="col-8">
                            <input class="form-control" placeholder="Your Email" type="email">
                        </div>
                        <!-- col.// -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
                        </div>
                        <!-- col.// -->
                    </form>
                    <small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
                </div>
                <!-- col-md-6.// -->
            </div>

        </div>
        <!-- container // -->
    </section>
@stop
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
@endpush
