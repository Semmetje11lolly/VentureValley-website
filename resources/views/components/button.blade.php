@props([
    'variant' => 'primary',
    'size' => 'medium',
    'arrow' => 'right',
    'url' => null,
    'target' => '_self'
])

@php
    $baseClass = 'rounded-md inline-block font-semibold transition duration-250 h-fit';

    $variantClass = [
        'primary' => 'bg-[--button-primary-background-color] text-white hover:bg-[--button-primary-hover-background-color]',
        'transparent' => 'bg-transparent  text-white border-2 border-solid border-white hover:bg-[--button-transparent-hover-background-color]'
    ];

    $sizeClass = [
        'small' => 'px-4 py-1.5 text-sm',
        'medium' => 'px-6 py-2 text-base',
        'large' => 'px-8 py-2.5 text-xl'
    ];

    $classes = $baseClass . ' ' . $variantClass[$variant] . ' ' . $sizeClass[$size];
@endphp

@if(!empty($url))
    <a {{ $attributes->merge(['class' => $classes]) }} href="{{ $url }}" target="{{ $target }}"
       style="font-family: 'Amaranth', sans-serif; corner-shape: scoop">
        @if($arrow === 'left')
            <i class="fa-solid fa-angle-left"></i>
        @endif
        {{ $slot }}
        @if($arrow === 'right')
            <i class="fa-solid fa-angle-right"></i>
        @endif
    </a>
@else
    <button
        {{ $attributes->merge(['class' => $classes]) }}
        style="font-family: 'Amaranth', sans-serif; corner-shape: scoop">
        @if($arrow === 'left')
            <i class="fa-solid fa-angle-left"></i>
        @endif
        {{ $slot }}
        @if($arrow === 'right')
            <i class="fa-solid fa-angle-right"></i>
        @endif
    </button>
@endif
