@php

    $quantity = $ingredient->pivot->quantity;
    //$disabled = $quantity <= 0;    
    $unit =[1 => "UN", 2 => "L",3 => "Kg"];

@endphp

<x-structure title="Cadastro" header="{{ $stock->name }}">
    <form method="POST" action="{{ route('movement.move',['stock' => $stock->id, 'ingredient' => $ingredient->id]) }}">
        @csrf
        <div class="container-flexible d-flex flex-column justify-content-center align-items-center" style="margin-top: 20px;">

            <div class="col-9 d-flex">
                <x-frames.basicBox 
                    title="{{ $ingredient->name  }}" 
                    text="{{ $quantity . '  ' . $unit[$ingredient->unit]}}" 
                    width="100%" 
                    height="150px"
                />
            </div>
            
            <div class="col-9 d-flex">
                <div class="d-flex flex-column" style="display:flex; flex-direction: column; width: 50%;">
                    <x-fields.formInput  
                        type="number"
                        id="quantity" 
                        title="Movimentar"
                        name="quantity" 
                        value="{{ old('quantity') }}"
                        placeholder="Quantidade"
                        width="100%"
                        disabled=0
                    />
                    <div width="100%" style="display: flex; flex-direction:column; gap: 10px;">
                        <x-buttons.formButton
                            text="REQUISITAR"
                            width="100%"
                            height="50px"
                            name="type"
                            value="out"
                            disabled=0
                        />
                        <x-buttons.formButton
                            text="DEVOLVER"
                            width="100%"
                            height="50px"
                            color="#7ee283"
                            name="type"
                            value="in"
                            disabled=0
                        />
                    </div>
                </div>
                <div class="container">
                    <x-fields.formAreaText
                        id="description" 
                        title="Descrição"
                        name="description" 
                        text="{{ old('description') }}"
                        height="164px"
                        width="100%"
                        disabled=0
                        placeholder="Descreva o motivo da movimentação"
                    />
                </div>
            </div>
        </div>
    </form>
    
</x-structure>
