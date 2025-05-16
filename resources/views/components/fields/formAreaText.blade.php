<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <textarea 
        class="form-control" 
        id="{{ $id }}" 
        rows="3" 
        name="{{ $name }}" 
        {{ $disabled ? 'disabled' : ''}}
    >{{ $text }}</textarea>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>