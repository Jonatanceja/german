@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
@endphp
<x-layout>
@include('partials.nav')
<x-buttons :page="$page" :site="$site" scroll-threshold="150" :show-back-button="true" />
@foreach ($page->children()->listed() as $pelicula)
    @if ($image = $pelicula->principal()->toFile())
        <a href="{{ $pelicula->url() }}" aria-label="{{ $pelicula->title() }}">
            <div 
                class="h-64 md:h-screen flex flex-wrap content-center justify-center bg-cover bg-center relative z-0 wow fadeIn group" 
                style="background-image: url({{ $image->url() }});" 
                data-aos="fade"
                data-aos-delay="50"
                data-aos-duration="2000"
                data-aos-once="true"
                x-data
                x-init="
                    if(window.innerWidth >= 768){ // aplica solo en md+ (escritorio)
                        const textEl = $refs.textContainer;
                        textEl.style.transition = 'opacity 0.4s ease-out';
                        const updateOpacity = () => {
                            const rect = textEl.getBoundingClientRect();
                            const centerY = rect.top + rect.height / 2;
                            const halfScreen = window.innerHeight / 2;
                            const topOffset = window.innerHeight * 0.07; // 7% desde arriba
                            let opacity = 1;
                            if(centerY < halfScreen){
                                opacity = Math.max((centerY - topOffset) / (halfScreen - topOffset), 0);
                            }
                            textEl.style.opacity = opacity;
                        };
                        window.addEventListener('scroll', updateOpacity);
                        updateOpacity();
                    }
                "
            >
                 
                <!-- Overlay que cubre toda la tarjeta -->
                <div class="absolute inset-0 w-full h-full bg-black/0 backdrop-blur-0 transition duration-500 pointer-events-none z-10"></div>

                <!-- Contenedor del título y director -->
                <div class="relative z-20 text-center" x-ref="textContainer">
                    <h2 class="text-xl md:text-2xl uppercase text-white tracking-widest cursor-pointer hover:after:block"
                        onmouseover="this.parentElement.previousElementSibling.classList.add('bg-black/20','backdrop-blur-sm')"
                        onmouseout="this.parentElement.previousElementSibling.classList.remove('bg-black/20','backdrop-blur-sm')"
                    >
                        {{ $pelicula->title() }}
                    </h2>
                    @if ($pelicula->director()->isNotEmpty())
                        <h3 class="text-xs text-white italic tracking-widest mt-2">{{ $pelicula->director() }}</h3>
                    @endif
                </div>

            </div>
        </a>
    @endif
@endforeach

</x-layout>