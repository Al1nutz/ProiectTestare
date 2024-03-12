@extends('layouts.master')
@section('content')

    <style>
        .fixed-image-size {
            max-width: 100%; /* Ensure the image doesn't exceed its container */
            height: auto; /* Maintain aspect ratio */
            /* Set your preferred fixed dimensions */
            width: 400px; /* Adjust this value as needed */
            height: 400px; /* Adjust this value as needed */
        }
    </style>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <!-- Product image -->
                    <img src="{{ $product->img_url }}" alt="Product Image" class="fixed-image-size mb-3 mb-md-0" />
                </div>
                <div class="col-md-6">
                    <!-- Product details -->
                    <h2>{{ $product->name }}</h2>
                    <p>{{__("Description")}}: {{ $product->description }}</p>
                    <p>{{__("Type")}}: {{ $product->category->category }}</p>
                    <p>{{__("Price")}}: {{ $product->price }} RON</p>

                    <!-- Add to cart form -->
                    <form method="POST" action="{{ route('cart.addQuantity', ['id' => $product->id, 'quantity' => '__QUANTITY__']) }}" id="addToCartForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <label for="quantity">{{__("Quantity")}}:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1">
                        <button type="submit" class="btn btn-outline-dark">{{__("Add to cart")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('addToCartForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const quantity = document.getElementById('quantity').value;
            const formAction = "{{ route('cart.addQuantity', ['id' => $product->id, 'quantity' => '__QUANTITY__']) }}".replace('__QUANTITY__', quantity);
            this.setAttribute('action', formAction);
            this.submit();
        });
    </script>
@endsection
