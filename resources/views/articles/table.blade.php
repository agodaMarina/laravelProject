<div class="table-responsive">
    <table class="table" id="articles-table">
        <thead>
        <tr>
            <th>Libelle</th>
        <th>Quantite</th>
        <th>Prix Unitaire</th>
        <th>Categorie</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->libelle }}</td>
            <td>{{ $article->quantite }}</td>
            <td>{{ $article->prix_unitaire }}</td>
            <td>{{ $article->categories['libelle'] }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articles.show', [$article->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('articles.edit', [$article->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
