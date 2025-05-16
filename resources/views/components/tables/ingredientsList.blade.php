<div class="container-flexible">
    <table class="table table-hover table-striped">
        <thead >
            <tr>
                @foreach ($headers as $header)
                    <th class="bg-secondary text-light container-flexible" scope="col">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{  $row['id']     }}</td>
                    <td>{{  $row['name']   }}</td>
                    <td>{{  $row['description']  }}</td>
                    <td>
                        <a href=" {{ route('ingredients.show',['ingredient' => $row['id'], 'blocked' => true]) }} ">
                            <i class="bi bi-search cursor-pointer icon-hover" style="cursor: pointer;"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('ingredients.show', ['ingredient' => $row['id'], 'blocked' => false]) }}">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('ingredients.destroy', $row['id']) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none; background:none; padding:0;">
                                <i class="bi bi-trash cursor-pointer icon-hover"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>






