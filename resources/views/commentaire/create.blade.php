@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
    <title>Creation d'un commentaire</title>
    <div class="container">
        <div class="row">
            <form action="{{route('commentaire.store')}}" method="POST">
                {!! csrf_field() !!}
                {{--<h1>Creation d'un commentaire pour le jeu {{$jeu->nom}}</h1>--}}
                <div class="col-md-6">
                    <div class="item">
                        <p>Commentaire</p>
                        <div class="name-item">
                            <input type="text" name="commentaire" id="commentaire" value="{{ old('commentaire') }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <p>Note</p>
                        <div class="name-item">
                            <input type="text" name="note" id="note" value="{{ old('note') }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <p>id du jeu (temporaire)</p>
                        <div class="name-item">
                            <input type="text" name="jeu_id" id="jeu_id" value="{{ old('jeu_id')}}"/>
                        </div>
                    </div>
                </div>
        </div>
        <div>
            <div class="btn-block">
                <a href="{{route("jeux.index")}}" class="btn-href">Retour</a>
                <button type="submit" href="/">Valider</button>
            </div>
        </div>
        </form>
    </div>


@endsection
