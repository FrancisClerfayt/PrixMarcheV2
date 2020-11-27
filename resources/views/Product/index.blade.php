@extends('layouts.app')

@section('title', 'Tous les produits')

@section('content')
<div class="container">
	<div class="row">
		<a href=" {{ route('Product.create') }} " class="btn btn-success my-2">
			<span class="fa fa-plus"> Ajouter un produit</span>
		</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nom produit :</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
						<tr>
							<td>
								{{ $product->name }}
							</td>
							<td>
								<a href="{{ route('Product.show', ['Product' => $product->id]) }} " class="btn btn-success">
									<span class="fa fa-eye"> Détails</span>
								</a>
								<a href="{{ route('Product.edit', ['Product' => $product->id]) }}" class="btn btn-primary">
									<span class="fa fa-edit"> Modifier</span>
								</a>
								<form action="{{ route('Product.destroy', ['Product' => $product->id]) }}" method="POST" style="display: contents">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger" type="submit">
										<span class="fa fa-trash"> Supprimer</span>
									</button>
								</form>
							</td>
						</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection