<div class="mb-3 form-check" style="margin-top: 20px;">
    <input 
        type="checkbox" 
        class="form-check-input" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        value="{{ $value }}" 
        {{ $disabled ? 'disabled' : ''}}
        checked>
    <label class="form-check-label" for="active">{{ $title }}</label>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>