@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center w-100">Ajouter un produit</h2>
		<form action="{{ route('Product.store') }}" method="POST" class="col-sm-8 mx-auto">
			@csrf
			<div class="form-group">	
				<label for="name">Nom du produit : </label>
				<input class="form-control" name="name" id="name" type="text" required autofocus>
			</div>
			<div class="form-group">
				<label for="price">Prix : </label>
				<input class="form-control" name="price" id="price" type="text" required autofocus>
			</div>
			<div class="form-group">
				<label for="picture">chemin de l'image : </label>
				<input class="form-control" name="picture" id="picture" type="text" required autofocus>
			</div>
			<div class="form-group">
				<label for="picture_alt">Texte alternatif de l'image : </label>
				<input class="form-control" name="picture_alt" id="picture_alt" type="text" required autofocus>
			</div>
			<div class="form-group">
				<label for="category_id">Choississez la catégorie : </label>
				<select  name="category_id" id="category_id" required autofocus>
					@foreach ($categories as $category)
					<option value=" {{ $category->id }} "> {{ $category->name }} </option>
					@endforeach
				</select>
			</div>
			<button name="submit" type="submit" class="btn btn-primary">Ajouter Produit</button>
		</form>
	</div>
</div>
@endsection