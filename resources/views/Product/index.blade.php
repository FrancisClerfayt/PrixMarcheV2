@extends('layouts.app')

@section('title', 'Tous les produits')

@section('content')
<div class="container">
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>  </th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@foreach ($products as $product)
Produit: <a href="{{ route('Product.show', ['Product' => $product->id]) }}">{{ $product->name}}</a><br>
<a href="{{ route('Product.edit', ['Product' => $product->id]) }}">Editer</a>
<form action="{{ route('CartProduct.store') }}" method="POST">
	@csrf
	Quantité: 
	<input type="number" name="quantity" value="1">
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<button type="submit">Ajouter au panier</button>
</form>
<form action="{{ route('Product.destroy', ['Product' => $product->id]) }}" method="POST">
	@csrf
	@method('DELETE')
	<button type="submit">Supprimer</button>
</form>
@endforeach
@endsection