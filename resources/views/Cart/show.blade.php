Panier n°{{ $cart->id }}<br>
Créé par {{ $cart->user->email }} (Utilisateur n° {{ $cart->user->id }})<br>
Contenu:
@foreach ($cart->cart_products as $product)
  <br>---------<br>
  Produit:{{ $product->product->name }}<br>
  Quantité:{{ $product->quantity }}
  <form action="{{ route('CartProduct.destroy', ['CartProduct' => $product->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer ce produit</button>
  </form>
  <br>---------<br>
@endforeach