@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
<html>
<head>
    <title>Liste des jeux</title>
</head>
<div>
    <button type="button" class="btn btn-success"><a href="{{route("jeux.create")}}">Ajouter un jeu</a>
    </button>
<br>
    <br>
    <form action="{{route('jeux.index')}}" method="GET">
        <label for="selectTri"><h4>Trier par : </h4></label>
        <select id="selectTri" name="tri" onchange="this.form.submit()">
            <option value="none">--Trier par--</option>
            <option value="nom">nom</option>
            <option value="nombre_joueurs">nombre de joueurs</option>
            <option value="duree">durée</option>
        </select>
    </form>
</div>
<div>
    <form action="{{route('jeux.index')}}" method="GET">
        <label for="triEditeur"><h4>Choix de l'éditeur</h4></label>
        <select id="triEditeur" name="editeur_id" onchange="this.form.submit()">
            <option value="none">--Editeurs--</option>
            @foreach($editeurs as $editeur)
                <option value="{{$editeur->id}}" @if($editeur->id==$editeur_id) selected @endif>{{$editeur->nom}}</option>
            @endforeach
        </select>
    </form>
</div>
<div>
    <form action="{{route('jeux.index')}}" method="GET">
        <label for="triTheme"><h4>Choix du theme</h4></label>
        <select id="triTheme" name="themes_id" onchange="this.form.submit()">
            <option value="none">--Themes--</option>
            @foreach($themes as $theme)
                <option value="{{$theme->id}}" @if($theme->id==$themes_id) selected @endif>{{$theme->nom}}</option>
            @endforeach
        </select>
    </form>
</div>


<body>
<h2 class="display-4 text-center text-gray p-md-3">La liste des jeux</h2>
    <table border="1px">
        <tr>
            <td>Nom</td><td>Description</td><td>Photo</td><td>Theme</td><td>Durée</td><td>Nombre de joueurs</td><td>Editeur</td><td>Mécanique</td><td>Voir plus</td>
        </tr>
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu->nom}}</td>
                <td> {{$jeu->description}}</td>
                <td><img src="{{$jeu->url_media}}"></td>
                <td>{{$jeu->theme->nom}}</td>
                <td>{{$jeu->duree}}</td>
                <td>{{$jeu->nombre_joueurs}}</td>
                <td>{{$jeu->editeur->nom}}</td>
                <td>{{$jeu->mecaniques}}</td>∕
                <td><a href = {{route('jeux.show',$jeu->id)}}>Plus d'infos</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
@endsection
