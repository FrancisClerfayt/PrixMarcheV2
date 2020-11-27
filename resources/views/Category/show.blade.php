@extends('layouts.app')

@section('title', 'Détails catégorie')

@section('content')
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h2>Produits de la catégorie {{ $category->name }} </h2>
					<table class="table table-striped">
						<thead></thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
@endsection