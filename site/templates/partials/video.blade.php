<div class=""
    data-aos="fade"
    data-aos-delay="50"
    data-aos-duration="2000"
    data-aos-once="true">
    @if ($video = $page->video()->toFile())
        @if ($image = $page->portada()->toFile())
            <div class="flex items-center justify-center relative">
                <picture>
                    <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 1920, 'height' => 1080, 'crop' => 'center'])->url() }}" type="image/webp">
                    <img class="w-full" src="{{ $image->crop(1920, 1080)->url() }}" alt="Portada de video {{ $page->title() }}">
                </picture>

                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    {{-- Botón Play que abre Fancybox --}}
                    <a data-fancybox href="{{ $video->url() }}" class="block group" aria-label="Play video {{ $page->title() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             fill="currentColor" 
                             viewBox="0 0 24 24" 
                             class="w-16 h-16 text-white opacity-70 group-hover:opacity-100 transition-opacity">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </a>

                    <div class="mx-auto py-5">
                        <h1 class="text-2xl uppercase text-white tracking-widest text-center">
                            {{ $page->title() }}
                        </h1>
                        @if ($page->director()->isNotEmpty())
                        <h4 class="text-xs text-white text-center italic tracking-widest mt-2">
                            Dirección {{ $page->director() }}
                        </h4>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
