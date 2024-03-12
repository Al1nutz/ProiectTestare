@extends('layouts.master')
@section('content')
    <style>
        .clickable:hover {
            cursor: pointer;
            color: #666;
        }

    </style>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Music Shop</h1>
                <p class="lead fw-normal text-white-50 mb-0">{{__("Buy your favourite albums and merch")}}</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if(isset($selectedCategory))
                <h3>{{ $selectedCategory->category }}</h3>
            @endif
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col mb-4">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top clickable" src="{{ $product->img_url }}" alt="Product Image" onclick="redirectToShowPage('{{ route('products.show', ['id' => $product->id]) }}')"/>
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder clickable" onclick="redirectToShowPage('{{ route('products.show', ['id' => $product->id]) }}')">{{ $product->name }}</h5>
                                </div>
                            </div>
                            <!-- Product price-->
                            <div class="card-footer p-4 border-top-0 bg-transparent">
                                <div class="text-center">
                                    {{ $product->price }} RON
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <form action="{{ route('cart.addToCart', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <div class="text-center">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-outline-dark mt-auto">{{__("Add to cart")}}</button>
                                    </div>

                                </form>
{{--                                <div class="text-center">--}}
{{--                                    <a class="btn btn-outline-dark mt-auto" href="#">{{ __('Add to cart') }}</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </section>


    <script>
        function redirectToShowPage(url) {
            window.location.href = url;
        }
    </script>
@endsection
