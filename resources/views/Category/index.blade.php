@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h2>Catégories</h2>
			<a href=" {{ route('Category.create') }} " class="btn btn-success my-2">
				<span class="fa fa-plus"> Ajouter une catégorie</span>
			</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nom Categorie</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)
					<tr>
						<td> {{ $category->name }} </td>
						<td>
							<a href="{{ route('Category.show', ['Category' => $category->id]) }} " class="btn btn-success">
								<span class="fa fa-eye"> Détails</span>
							</a>
							<a href="{{ route('Category.edit', ['Category' => $category->id]) }}" class="btn btn-primary">
								<span class="fa fa-edit"> Modifier</span>
							</a>
							<form action="{{ route('Category.destroy', ['Category' => $category->id]) }}" method="POST" style="display: contents">
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
</div>
@endsection