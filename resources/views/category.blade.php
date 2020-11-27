@extends('layouts.app')

@section('title', 'Toutes les catégories')

@section('content')
<div class="container">
	<div class="row">
		<h2 class="mx-2 ">Toutes les catégories</h2>
	</div>
	<div class="row">
		<div class="col"></div>
		<div class="col-10">
			<div class="row my-2 justify-content-around align-items-center">
				@foreach ($categories as $category)
				<div class="d-flex align-items-center justify-content-center col-3 px-2 m-2 category_rectangle">
					<p class="m-0 text-center category_name">
						<a href="{{ route('category.detail', ['id' => $category->id]) }}" class="link-category">
							{{ $category->name }}
						</a>
					</p>
				</div>
				@endforeach
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
@endsection