@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
    $cropType = $page->cropType()->value() ?? 'regular'; // default regular
    $delay = 50; // Delay inicial en ms
    $increment = 100; // Incremento por cada imagen
@endphp

<x-layout>
@include('partials.nav')

<x-buttons :page="$page" :site="$site" scroll-threshold="150" :show-back-button="true" />


<div class="grid grid-cols-1 md:grid-cols-2">
    @foreach ($page->gallery()->toFiles() as $image)
    @php
        $currentDelay = $delay;
        $delay += $increment;
    @endphp
    @if($cropType === 'regular')
        <picture>
            <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 960, 'height' => 540, 'crop' => 'center'])->url() }}" type="image/webp">
            <img class="w-full" 
                 src="{{ $image->crop(960, 540)->url() }}" 
                 alt="Still {{ $page->title() }} {{ $loop->iteration }}"
                 data-aos="fade"
                 data-aos-delay="{{ $currentDelay }}"
                 data-aos-duration="2000"
                 data-aos-once="true"
                 data-aos-mirror="true"
                 data-aos-anchor-placement="top">
        </picture>
    @elseif($cropType === 'wide')
        <picture>
            <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 960, 'height' => 360, 'crop' => 'center'])->url() }}" type="image/webp">
            <img class="w-full" 
                 src="{{ $image->crop(960, 360)->url() }}" 
                 alt="Still {{ $page->title() }} {{ $loop->iteration }}"
                 data-aos="fade"
                 data-aos-delay="{{ $currentDelay }}"
                 data-aos-duration="2000"
                 data-aos-mirror="true"
                 data-aos-anchor-placement="top"
                 data-aos-once="true">
        </picture>
    @endif
@endforeach
</div>

@include('partials.video')

</x-layout>
