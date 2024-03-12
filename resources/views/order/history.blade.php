@extends('layouts.master')

@section('content')
    <h1 class="text-center">{{__("Order history")}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"> <!-- Adjust the column size as needed -->
                @foreach($orders as $order)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{__("Order ID")}}: {{ $order->id }}</h5>
                            <p class="card-text"><strong>{{__("Total price")}}:</strong> {{ $order->total_amount }} RON</p>
                            <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">{{__("Items")}}:</h6>
                            <ul class="list-group list-group-flush">
                                @foreach($order->orderItems as $item)
                                    <li class="list-group-item">
                                        <strong>{{__("Product")}}:</strong> {{ $item->product->name }} <br>
                                        <strong>{{__("Price")}}:</strong> {{ $item->unit_price }} RON <br>
                                        <strong>{{__("Quantity")}}:</strong> {{ $item->quantity }} <br>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{ $orders->links() }} <!-- Pagination links -->
@endsection
