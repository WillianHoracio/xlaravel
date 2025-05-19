@php
    $style  = isset($height) ? "height: {$height};" : 'height: auto;';
    $style .= isset($width)  ? "width:  {$width};"  : 'width:  auto;';
    $disabled = $disabled ? 'disabled' : '';
@endphp

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <textarea 
        class="form-control" 
        id="{{ $id }}" 
        rows="3" 
        name="{{ $name }}"
        placeholder="{{ $placeholder ?? '' }}"
        style="{{ $style }}"
        {{ $disabled }}

    >{{ $text }}</textarea>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>