<x-structure title="Estoque" header="ESTOQUE" page="ESTOQUE">

    <div class="row" style="margin-top: 40px;">
        <div class="col-12">
            @php
                $headers = ['ID', 'Nome', 'Descrição','Status','','',''];
            @endphp
            <div class="container">
                <x-tables.stockslist :headers="$headers" :rows="$stocks" />
            </div>
        </div>
    </div>
</x-structure>