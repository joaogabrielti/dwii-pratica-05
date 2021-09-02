<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped">
        <thead class="table-secondary text-center text-uppercase">
            @foreach ($head as $item)
            <th>{{ $item }}</th>
            @endforeach
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($array as $obj)
            <tr class="text-center text-uppercase">
                @foreach ($head as $index)
                <td>{{ $obj[$index] }}</td>
                @endforeach
                <td>
                    <a class="link-secondary mx-1" href="{{ route($model.'.show', [$model => $obj['id']]) }}"><i class="bi bi-info-circle-fill"></i></a>
                    <a class="link-primary mx-1" href="{{ route($model.'.edit', [$model => $obj['id']]) }}"><i class="bi bi-pencil-fill"></i></a>
                    <a class="link-danger mx-1" href="javascript:form_{{ $obj['id'] }}.submit()"><i class="bi bi-trash-fill"></i></a>
                    <form class="d-none" action="{{ route($model.'.destroy', [$model => $obj['id']]) }}" method="POST" name="form_{{ $obj['id'] }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
