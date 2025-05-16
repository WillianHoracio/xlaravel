@php
    $quantity = $ingredient->pivot->quantity;
    $disabled = $quantity <= 0;    
    $unit =[1 => "UN", 2 => "L",3 => "Kg"];

@endphp

<x-structure title="Cadastro" header="{{ $stock->name }}">
    <form method="POST" action="{{ route('stock.store') }}">
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
                        id="request" 
                        title="Requisitar"
                        name="request" 
                        value="{{ old('request') }}"
                        width="100%"
                        :disabled=$disabled
                    />
                    <x-fields.formInput  
                        id="entry" 
                        title="Devolver"
                        name="entry" 
                        value="{{ old('entry') }}"
                        width="100%"
                        :disabled=0
                    />
                </div>
                <div class="container">
                    <x-fields.formAreaText
                        id="description" 
                        title="Descrição"
                        name="description" 
                        text="{{ old('description') }}"
                        height="126px"
                        width="100%"
                        :disabled=0
                    />
                </div>
            </div>
            <div class="col-9 d-flex">
                    <x-buttons.formButton 
                        text="MOVIMENTAR" 
                        width="100%" 
                        height="50px"
                        disabled=0
                    />
            </div>
        </div>
    </form>
</x-structure>
