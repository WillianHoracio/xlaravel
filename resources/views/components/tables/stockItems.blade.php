
@php
    $unit =[1 => "UN", 2 => "L",3 => "Kg"];
@endphp 
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
                    <td>{{ $row['name']            }}</td>
                    <td>{{ $row->pivot->quantity   }}</td>
                    <td>{{ $unit[$row['unit']]     }}</td>
                    <td>
                        <a href="{{ route('stock.ingredient',['stock' => $row->pivot->stock_id , 'ingredient' => $row['id']]) }}">
                            <i class="bi bi-arrow-left-right cursor-pointer icon-hover" style="cursor: pointer;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>