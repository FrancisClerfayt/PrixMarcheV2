
@foreach ($carts as $cart)
<a href="{{ route('Cart.show', ['Cart' => $cart]) }} ">Panier n°{{ $cart->id }}</a> : {{ $cart->user->email }} <strong>{{ $cart->status }}</strong>
@endforeach