@props([
    'height' => 'medium',
    'image' => asset('/images/HeaderDefault.jpg')
])

@php
    $baseClass = 'content-center text-center text-white bg-center bg-no-repeat bg-cover';

    $heightClass = [
        'small' => 'h-[200px]',
        'medium' => 'h-[300px]',
        'large' => 'h-[500px]'
    ];

    if(!empty($image)) {
        $imageClass = "background-image: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.5)), url({$image})";
    }

    $classes = $baseClass . ' ' . $heightClass[$height];
@endphp

<header {{ $attributes->merge(['class' => $classes]) }} @if(!empty($image)) style="{{ $imageClass }}" @endif id="main">
    <div class="max-w-xl mx-auto">
        {{ $slot }}
    </div>
</header>
