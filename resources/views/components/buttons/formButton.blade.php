@php
    $disabled = $disabled ? 'disabled' : '';
    $style  = isset($width)  ? "width: {$width};"   : 'width: auto;';
    $style .= isset($height) ? "height: {$height};" : 'height: auto;';
    $style .= isset($color)  ? "background-color: {$color}; border-color: {$color}" : '';
@endphp

<button 
    type="submit" 
    class="btn btn-secondary btn-lg text-light"
    name="{{ $name ?? '' }}"
    style="{{ $style }}"
    value="{{ $value ?? '' }}"
    {{ $disabled }}
>
    {{ $text }}
</button>