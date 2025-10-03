@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
    $delay = 50; // Delay inicial en ms
    $increment = 100; // Incremento por cada imagen
@endphp
<x-layout>
    @include('partials.nav')
    <x-buttons :page="$page" :site="$site" scroll-threshold="150" :show-back-button="true" />
    <div class="grid grid-cols-1 md:grid-cols-2">
        @foreach ($page->children()->listed() as $comercial)
            @php
            $currentDelay = $delay;
            $delay += $increment;
            @endphp
            @if ($image = $comercial->principal()->toFile())
            @php
                $bgWebp = $image->thumb(['format' => 'webp', 'width' => 960, 'height' => 360, 'crop' => 'center'])->url();
                $bgFallback = $image->url(); // fallback original
            @endphp
                <a href="{{ $comercial->url() }}">
                    <div 
                        class="h-64 lg:h-72 xl:h-80 flex flex-wrap content-center bg-cover bg-center wow fadeIn relative group" 
                        style="background-image: url({{ $bgWebp }});"
                        data-aos="fade"
                        data-aos-delay="{{ $currentDelay }}"
                        data-aos-duration="1000"
                        data-aos-mirror="true"
                        data-aos-once="true"
                        data-aos-anchor-placement="top"
                    >
                        <!-- Overlay solo en escritorio -->
                        <div class="absolute inset-0 bg-black/30 md:backdrop-blur-sm opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Títulos escritorio (solo hover) -->
                        <div class="hidden md:flex relative z-20 w-full flex-col items-center justify-center h-full text-center px-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <h2 class="text-2xl uppercase text-white tracking-widest text-shadow-lg">
                                {{ $comercial->title() }}
                            </h2>
                            @if ($comercial->director()->isNotEmpty())
                                <h3 class="text-xs text-white italic tracking-widest mt-2 text-shadow-lg">
                                    Dirección {{ $comercial->director() }}
                                </h3>
                            @endif
                        </div>
                        <div class="block md:hidden">v</div>
                        <!-- Títulos móvil (fade del 5% al 0%) -->
                        <div 
                            x-data="{ opacity: 1 }"
                            x-init="
                                opacity = 1; // fuerza opacidad inicial 1
                                const updateOpacity = () => {
                                    if (window.innerWidth < 768) {
                                        const rectTop = $el.getBoundingClientRect().top;
                                        const fadeStart = window.innerHeight * 0.02; // 5%
                                        const fadeEnd = 0; // 0%

                                        if (rectTop > fadeStart) {
                                            opacity = 1; // Elemento aún lejos del top
                                        } else if (rectTop <= fadeStart && rectTop > fadeEnd) {
                                            opacity = (rectTop - fadeEnd) / (fadeStart - fadeEnd); // Fade progresivo
                                        } else {
                                            opacity = 0; // Llegó al top
                                        }
                                    } else {
                                        opacity = 1; // Escritorio siempre visible
                                    }
                                };
                                window.addEventListener('scroll', updateOpacity);
                                window.addEventListener('resize', updateOpacity);
                            "
                            x-bind:style="'opacity:' + opacity"
                            class="flex md:hidden relative z-20 w-full flex-col items-center justify-center h-full text-center px-4 transition-opacity duration-500"
                        >
                            <h2 class="text-lg uppercase text-white tracking-widest text-shadow-lg">
                                {{ $comercial->title() }}
                            </h2>
                            @if ($comercial->director()->isNotEmpty())
                                <h3 class="text-xs text-white italic tracking-widest mt-2 text-shadow-lg">
                                    Dirección {{ $comercial->director() }}
                                </h3>
                            @endif
                        </div>



                    </div>
                </a>
            @endif
        @endforeach
    </div>
    <noscript>
        <style>
            .bg-fallback {
                background-image: url('{{ $bgFallback }}') !important;
            }
        </style>
    </noscript>
</x-layout>
