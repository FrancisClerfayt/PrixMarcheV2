
@extends('layouts.app')
@section('title', 'contact')
@section('content')
<div class="container my-5">
  <div class="row">
    
    <form class="container-fluid">
      @csrf
      <h1>Contact</h1>
      <div>
        <p class="my-4">
          Avez-vous consulter les <a href=" {{ route('question') }} ">Questions fréquentes</a>?
          La réponse à votre problématique s’y trouve sûrement.
          Si toutefois vous souhaitez nous contacter par mail, veuillez remplir le formulaire ci-dessous.
        </p>
      </div>
      <div class="row">
        <div class="col-6 form-group">
          <label for="last_name">Nom:</label>
          <input type="text" class="form-control" name="last_name"/>
        </div>  
        <div class="col-6 form-group">
          <label for="phone">Téléphone:</label>
          <input type="text" class="form-control" name="phone"/>
        </div>
      </div>
      <div class="row">
        <div class="col-12 form-group">
          <label for="email">Email*:</label>
          <input type="email" class="form-control" name="email" required/>
        </div>
        <div class=" col-12 form-group">
          <label for="message">Votre message*:</label>
          <textarea type="text" class="form-control" name="text" required></textarea>
        </div>
      </div>  
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>
</div>
@endsection