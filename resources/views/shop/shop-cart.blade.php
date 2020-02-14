@extends('layout.shop')
@section('title', 'Cart')
@section('content')
    <div class="cart-page">
        <form method="post" action="{{ route('cart.update') }}">
            @csrf
            <div class="container">
                <div class="cart-table">
                    <table>
                        <thead>
                        <tr>
                            <th class="product-h">Product</th>
                            <th>Price</th>
                            <th class="quan">Quantity</th>
                            <th>Total (VND)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cart->list as $key => $item)
                            <tr>
                                <td class="product-col">
                                    <img src="{{ asset("storage/".$item['product']->image) }}" alt="">
                                    <div class="p-title">
                                        <h5>{{ $item['product']->name }}</h5>
                                    </div>
                                </td>
                                <td class="price-col">{{ number_format($item['product']->price) }}</td>
                                <td class="quantity-col">
                                    <div class="pro-qty">
                                        <input type="text" value="{{ $item['quantity'] }}" name="{{ "quantity".$key }}">
                                    </div>
                                </td>
                                <td class="total">{{ number_format($item['price']) }}</td>
                                <td class="product-close"><a href="{{ route('cart.delete', $key) }}">x</a></td>
                            </tr>
                            @empty
                                <tr>
                                    <td><a href="#">No shop cart. Click here to shopping now!</a></td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="cart-btn">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="coupon-input">
                                <input type="text" placeholder="Enter cupone code" value="{{ $cupon }}" name="cupon">
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                            <a class="site-btn clear-btn" href="{{ route('cart.clear') }}">Clear Cart</a>
                            <button type="submit" class="site-btn update-btn">Update Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shopping-method">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shipping-info">
                                <h5>Choose a shipping</h5>
                                <div class="chose-shipping">
                                    <div class="cs-item">
                                        <input type="radio" name="cs" id="one" value="" class="cs-input">
                                        <label for="one" class="active">
                                            Free Standard shipping
                                            <span>Estimate for New York</span>
                                        </label>
                                    </div>
                                    <div class="cs-item">
                                        <input type="radio" name="cs" id="two" value="" class="cs-input">
                                        <label for="two">
                                            Next Day delievery 40,000 VND
                                            <span>Fees may be higher depending on the province</span>
                                        </label>
                                    </div>
                                    <div class="cs-item last">
                                        <input type="radio" name="cs" id="three" value="" class="cs-input">
                                        <label for="three">
                                            In Store Pickup - Free
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="total-info">
                                <div class="total-table">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>Subtotal</th>
                                            <th>Shipping</th>
                                            <th class="total-cart">Total Cart</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="total">{{ number_format($cart->totalPrice) }}</td>
                                            <td class="sub-total">{{ number_format($cart->totalPrice) }}</td>
                                            <td class="shipping">Free</td>
{{--                                                @if ($cs==0) Free  @else {{ number_format((int)$cs) }} @endif</td>--}}
                                            <td class="total-cart-p">{{ number_format($cart->totalPrice - (int)$cs) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <a href="#" class="primary-btn chechout-btn">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Cart Page Section End -->

@endsection
