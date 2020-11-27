@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="title-delivery">Retrait et Livraison</h1>
		<p class="description-delivery">
			Vous serez informé par email ou sms de l'avancement de la préparation de votre demande. Vous pouvez annuler votre demande à tout moment à l'aide du formulaire Contact. Le paiement se fait lors du retrait ou de la livraison. Seuls les articles livrés seront facturés.
		</p>
	</div>
	<div class="row mt-4">
		<div class="col-5 d-flex flex-column justify-content-between delivery_informations p-4 rounded shadow">
			<div>
				<h2>Retrait magasin</h2>
				<p class="container-store">
					Retrait de marchandises sur rendez-vous uniquement à notre local d'Anzin
				</p>
			</div>
			<a class="btn btn-warning w-25" href=" {{ route('contact') }} ">Contact</a>
		</div>
		<div class="col"></div>
		<div class="col-5 d-flex flex-column delivery_informations p-4 rounded shadow">
			<h2>Livraison</h2>
			<p>
				Durant la période de confinement,
				il n'y a pas de retrait sur les marchés.​
				selon votre adresse et le montant de votre préparation, une livraison à votre domicile pourra être proposée.<br>
				Points retraits sur les marchés :<br>
				Suspendu durant la période de confinement
			</p>
			<a class="btn btn-warning w-25" href=" {{ route('contact') }} ">Contact</a>
		</div>
	</div>
</div>
@endsection