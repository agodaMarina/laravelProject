<div class="table-responsive">
    <table class="table" id="articleFromTables-table">
        <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articleFromTables as $articleFromTable)
            <tr>
                
                <td width="120">
                    {!! Form::open(['route' => ['articleFromTables.destroy', $articleFromTable->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articleFromTables.show', [$articleFromTable->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('articleFromTables.edit', [$articleFromTable->id]) }}"
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
