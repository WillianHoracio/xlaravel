<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <input 
        type="text" 
        class="form-control" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        value="{{ $value }}" 
        {{ $disabled ? 'disabled' : ''}}
    />
    @error( $name )
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>