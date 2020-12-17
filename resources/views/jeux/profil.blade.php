@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@php
    $results = DB::select(DB::raw('select jeux.nom,achats.date_achat,achats.prix,achats.lieu from jeux inner join achats on jeux.id=achats.jeu_id where achats.user_id=1'));
    //$affected = DB::achats('users')
      //        ->where('id', 1)
        //      ->update(['options->enabled' => true]);
    //$achat = DB::table('users')->increment('votes');
@endphp
@section('content')
<html>
    <head>
        <title> Profil </title>
    </head>

    <div>
        <p><strong>Nom  : </strong>{{$user->name}}</p>
        <p><strong>email : </strong>{{$user->email}}</p>

        <a href="{{route("achat.create")}}" class="button">Ajouter l'achat d'un jeu</a>

        <p>Mes jeux :</p>
        @foreach($results as $jeu)
            <p><strong>Nom :</strong>{{$jeu->nom}}<br> <strong>Date d'achat :</strong>{{$jeu->date_achat}} <strong>Prix :</strong>{{$jeu->prix}} <strong>Lieu de stockage :</strong>{{$jeu->lieu}}
        @endforeach
    </div>
</html>
@endsection




