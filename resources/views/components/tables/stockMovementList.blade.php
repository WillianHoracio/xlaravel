@php
    $types = [
        'in'  => 'Devolução',
        'out' => 'Requisição'
    ];
@endphp 

<div class="container-flexible">
    <table class="table table-hover">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="bg-secondary text-light container-flexible">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td class="bg-{{ $row['type'] }}">{{ $row['quantity']     }}</td>
                    <td class="bg-{{ $row['type'] }}">{{ $types[$row['type']] }}</td>
                    <td class="bg-{{ $row['type'] }}">{{ $row['description']  }}</td>
                    <td class="bg-{{ $row['type'] }}">{{ $row['created_at']   }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
