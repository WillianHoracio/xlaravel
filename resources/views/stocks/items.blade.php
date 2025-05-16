
<x-structure title="Cadastro" header="{{ $stock->name }}">

    <div class="row" style="margin-top: 40px;">
        <div class="col-12">
            @php
                $headers = ['Produto', 'Quantidade', 'U.M.','',''];
            @endphp
            <div class="col-7 mx-auto">
                <x-tables.stockItems :headers="$headers" :rows="$ingredients" />
            </div>
        </div>
    </div>

</x-structure>