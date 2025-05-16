<x-structure title="Ingredientes" header="{{ 'CONSULTANDO: '.$ingredient->name }}" page="INGREDIENTES">
    <x-forms.ingredientDataForm :ingredient="$ingredient" :readOnly=$readOnly />
</x-structure>