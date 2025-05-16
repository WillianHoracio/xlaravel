
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
                        <i class="bi bi-plus cursor-pointer icon-hover" style="cursor: pointer;"></i>
                    </td>
                    <td>
                        <i class="bi bi-dash cursor-pointer icon-hover" style="cursor: pointer;"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>