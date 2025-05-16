<div class="row justify-content-center">
    <div class="col-7" style="margin-top: 40px;">
        <form action="{{ route('stock.store') }}" method="POST">
            @csrf

            <x-fields.formInput
                title="Nome"
                id="name"
                name="name"
                value="{{ old('name') }}"
                disabled=0
            />
            
            <x-fields.formAreaText
                title="Descrição"
                id="description"
                name="description"
                text="{{ old('description') }}"
                disabled=0
            />

            <x-fields.formCheckBox
                title="Unidade"
                id="unit"
                name="unit"
                value="{{ old('unit') }}"
                disabled=0
            />
            
            <x-buttons.formButton
                text="Salvar"
                disabled=0
            />

        </form>
    </div>
</div>