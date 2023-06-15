<!-- Libelle Field -->
<div class="col-sm-12">
    {!! Form::label('libelle', 'Libelle:') !!}
    <p>{{ $article->libelle }}</p>
</div>

<!-- Quantite Field -->
<div class="col-sm-12">
    {!! Form::label('quantite', 'Quantite:') !!}
    <p>{{ $article->quantite }}</p>
</div>

<!-- Prix Unitaire Field -->
<div class="col-sm-12">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    <p>{{ $article->prix_unitaire }}</p>
</div>

<!-- Categorie Field -->
<div class="col-sm-12">
    {!! Form::label('categorie', 'Categorie:') !!}
    <p>{{ $article->categorie }}</p>
</div>

