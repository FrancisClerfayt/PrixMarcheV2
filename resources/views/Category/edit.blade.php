@extends('layouts.app')

@section('title', 'Modification Catégorie')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8">
			<form action=" {{ route('Category.update', ['Category'=>$Category->id] ) }} " method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="name">Nom Catégorie</label>
					<input type="text" class="form-control" id="name" name="name" value=" {{ $Category->name }} ">
				</div>
				<div class="form-group">
					<input type="submit" value="Valider modification" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection