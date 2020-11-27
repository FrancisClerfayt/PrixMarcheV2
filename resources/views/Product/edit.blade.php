@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-8">
			<form action="{{ route('Product.update', ['Product'=>$product->id]) }}" method="POST" >
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="name">Nom du produit</label>
					<input value=" {{ $product->name }} " name="name" id="name" type="text" tabindex="1" required autofocus>
				</div>
				<div class="form-group">
					<label for="price">Prix</label>
					<input value=" {{ $product->price }} " name="price" id="price" type="text" tabindex="1" required autofocus>
				</div>
				<div class="form-group">
					<label for="picture">chemin de l'image</label>
					<input value=" {{ $product->picture }} " name="picture" id="picture" type="text" tabindex="1" required autofocus>
				</div>
				<div class="form-group">
					<label for="picture_alt">Texte alternatif de l'image</label>
					<input value=" {{ $product->picture_alt }} " name="picture_alt" id="picture_alt" type="text" tabindex="1" required autofocus>
				</div>
				<div class="form-group">
					<label for="category_id">Choississez la catégorie</label>
					<select name="category_id" id="category_id" required autofocus>
						@foreach ($categories as $category)
						@if ($product->category->id == $category->id)
						<option value=" {{ $category->id }} " selected> {{ $category->name }} </option>
						@else
						<option value=" {{ $category->id }} "> {{ $category->name }} </option>
						@endif
						@endforeach
					</select>
				</div>
				<button class="btn btn-primary" name="submit" type="submit" id="contact-submit">Modifier Produit</button>
			</form>
		</div>
	</div>
</div>
@endsection