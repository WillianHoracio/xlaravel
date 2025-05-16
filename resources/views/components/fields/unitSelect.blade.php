<select 
    class="form-select" 
    name="unit" 
    id="unit" 
    {{ $disabled ? 'disabled' : ''}}
>
    <option value="1" {{ old('unit') == 1 ? 'selected' : '' }}>Unidade Base</option>
    <option value="2" {{ old('unit') == 2 ? 'selected' : '' }}>Litros</option>
    <option value="3" {{ old('unit') == 3 ? 'selected' : '' }}>Kg</option>
</select>
@error('unit')
    <div class="text-danger">{{ $message }}</div>
@enderror