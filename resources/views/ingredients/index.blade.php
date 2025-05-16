<x-structure title="Ingredientes" header="INGREDIENTES" page="INGREDIENTES">    
    <div class="row" style="margin-top: 40px;">
        <div class="col-12">
            @php
                $headers = ['ID', 'Nome', 'Descrição','','',''];
            @endphp
            <div class="container">
                <x-tables.ingredientsList :headers="$headers" :rows="$ingredients" />
            </div>
        </div>
    </div>
</x-structure>