<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $etudiant->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="col-sm-12">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{{ $etudiant->prenom }}</p>
</div>

<!-- Age Field -->
<div class="col-sm-12">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $etudiant->age }}</p>
</div>

<!-- Contact Field -->
<div class="col-sm-12">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $etudiant->contact }}</p>
</div>

<!-- Filiere Field -->
<div class="col-sm-12">
    {!! Form::label('filiere', 'Filiere:') !!}

    <p>{{ $filiere-> libelle }}</p>
</div>

