@extends('layouts.app')

@section('title', 'Details Produits')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-8">
			<ul class="list-group">
				<li class="list-group-item active">
					Name: {{ $product->name }}
				</li>
				<li class="list-group-item">
					Price: {{ $product->price }}
				</li>
				<li class="list-group-item">
					Image: {{ $product->picture }}
				</li>
				<li class="list-group-item">
					Image alt: {{ $product->picture_alt }}
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection