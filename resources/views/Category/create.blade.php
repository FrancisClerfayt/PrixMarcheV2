@extends('layouts.app')	

@section('title', 'Ajouter une catégorie')

@section('content')
		<div class="container">
			<div class="row">
				<form action="{{ route('Category.store') }}" method="POST" class="col-sm-8">
					@csrf
					<div class="form-group">
						<label for="name">Nom catégorie</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
@endsection