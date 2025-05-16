@php
    $disabled = $disabled ? 'disabled' : '';
    $style  = isset($width)  ? "width: {$width};"   : 'width: auto;';
    $style .= isset($height) ? "height: {$height};" : 'height: auto;';
@endphp

<button 
    type="submit" 
    class="btn btn-secondary btn-lg text-light"
    style="{{ $style }}"
    {{ $disabled }}
>
    {{ $text }}
</button>