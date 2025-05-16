<div class="row justify-content-center">
    <div class="col-11" style="margin-top: 40px;">
        <form action="{{ route('ingredients.store') }}" method="POST">
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

            <x-fields.unitSelect disabled=0/>

            <x-fields.formCheckBox
                title="Iniciar ativo"
                id="active"
                name="active"
                value="1"
                disabled=0
            />

            <x-buttons.formButton
                text="Salvar"
                disabled=0
            />
        </form>
    </div>
</div>