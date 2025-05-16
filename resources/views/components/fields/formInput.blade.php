@php
    $disabled   = $disabled ? 'disabled' : '';
    $style = isset($width) ? "width: {$width};" : 'width: auto;';
@endphp

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <input 
        type="text" 
        class="form-control" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        value="{{ $value }}"
        style="{{ $style }}"
        {{ $disabled }}
    />
    @error( $name )
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>