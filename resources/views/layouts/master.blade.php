<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Core theme CSS (includes Bootstrap)-->
{{--    <link href="{{ asset('/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">--}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/pagination.css') }}" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('products.index')}}">Music Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route("products.index")}}">{{__("Home")}}</a></li>
{{--                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__("Shop")}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route("products.index")}}">{{__("All Products")}}</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('products.filter', $category->id) }}">{{ $category->category }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="{{ route('order.history') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('history-form').submit();">
                                {{ __('Order history') }}
                            </a>

                            <form id="history-form" action="{{ route('order.history') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li>
                    <ul class="navbar-nav ms-2">
                        <div class="dropdown ms-auto me-2">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-cart-fill me-1"></i>
                                {{__("Cart")}}
                                <span class="badge bg-dark text-white ms-1 rounded-pill">
            <?php
            $cartItems = session()->get('cart', []);
            $totalQuantity = 0;
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalQuantity += $item['quantity'];
                $totalPrice += $item['quantity'] * $item['price']; // Calculate total price for each item
            }

            echo $totalQuantity;
            ?>
        </span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="cartDropdown">
                                <!-- Cart Items List -->
                                <?php foreach ($cartItems as $itemId => $item): ?>
                                <li>
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{__("Product")}}: </strong> <?php echo $item['name']; ?><br>
                                            <strong>{{__("Price")}}: </strong> <?php echo $item['price']." RON"; ?><br>
                                            <div class="d-flex align-items-center">
                                                <strong>{{__("Quantity")}}:  </strong> <?php echo $item['quantity']; ?>&nbsp;
                                                <!-- Remove Button -->
                                                <form action="{{ route('cart.removeFromCart', ['id' => $itemId]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $itemId }}">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ms-1"><i class="bi bi-x"></i></button>
                                                </form>
                                            </div>
                                            <strong>{{__("Total price")}}: </strong> <?php echo $item['quantity'] * $item['price']." RON"; ?><br>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <?php if (empty($cartItems)): ?>
                                <li class="dropdown-item">{{__("Cart is empty")}}</li>
                                <?php endif; ?>

                                    <!-- Cart subtotal -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <div class="dropdown-item">
                                        <strong>Subtotal:</strong> <?php echo $totalPrice." RON"; ?>
                                    </div>
                                </li>

                                <!-- View Cart Link -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('cart.view') }}">
                                        <span class="btn btn-dark w-100">{{__("View cart")}}</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                        <li>
                            @include('partials/language_switcher')
                        </li>
                    </ul>
                </li>
            </ul>

{{--            <form class="d-flex ms-3">--}}
{{--                <button class="btn btn-outline-dark" type="submit">--}}
{{--                    <i class="bi-cart-fill me-1"></i>--}}
{{--                    {{__("Cart")}}--}}
{{--                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>--}}
{{--                </button>--}}
{{--            </form>--}}

        </div>
    </div>
</nav>

<main class="flex-grow-1">
    @yield('content')
</main>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">
            Copyright &copy; Music Shop {{ date('Y') }}
        </p>
    </div>
</footer>

</body>
</html>
