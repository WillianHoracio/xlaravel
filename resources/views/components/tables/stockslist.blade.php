<div class="container-flexible">
    <table class="table table-light table-hover table-striped">
        <thead >
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="bg-secondary text-light container-flexible">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row['id']   }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['description']}}</td>
                    <td>{{ $row['active'] == 1 ? "Ativo" : "Inativo"}}</td>
                    <td>
                            <i class="bi bi-search cursor-pointer icon-hover" style="cursor: pointer;"></i>
                    </td>
                    <td>
                            <i class="bi bi-pencil cursor-pointer icon-hover" style="cursor: pointer;"></i>
                    </td>
                    <td>
                        <form action="{{ route('stock.destroy', $row['id']) }}" method="POST" style="display:inline">
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






