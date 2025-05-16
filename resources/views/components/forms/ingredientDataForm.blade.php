<div class="row justify-content-center">
    <div class="col-11" style="margin-top: 40px;">
        <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-fields.formInput
                title="Nome"
                id="name"
                name="name"
                value="{{ $ingredient->name }}"
                disabled="{{ $readOnly }}"
            />

            <x-fields.formAreaText
                title="Descrição"
                id="description"
                name="description"
                text="{{ $ingredient->description }}"
                disabled="{{ $readOnly }}"
            />

            <x-fields.unitSelect disabled="{{ $readOnly }}"/>

            <x-fields.formCheckBox
                title="Iniciar ativo"
                id="active"
                name="active"
                value="1"
                disabled="{{ $readOnly }}"
            />
            
            <x-buttons.formButton
                text="Salvar"
                disabled="{{ $readOnly }}"
            />

        </form>
    </div>
</div>