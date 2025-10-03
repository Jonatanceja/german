@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
@endphp
<x-layout>
    <div class="w-full text-shadow-md absolute">
        <h1 class="text-zinc-400 text-2xl uppercase tracking-widest text-center mt-8 w-full mx-auto opacity-60 select-none relative z-50"
            data-aos="fade"
            data-aos-delay="50"
            data-aos-duration="2000"
            data-aos-once="true"
            data-aos-anchor-placement="top"
            >{{ $site->title() }}
        </h1>

        <h4 class="text-zinc-500 text-sm uppercase tracking-widest text-center w-full select-none mt-3 relative z-50"
            data-aos="fade"
            data-aos-delay="100"
            data-aos-duration="2000"
            data-aos-once="true"
            data-aos-anchor-placement="top">
            Cinematographer
        </h4>

    </div>
    <div class="h-screen flex flex-wrap items-center">
    <div class="w-full md:w-2/3 mx-auto">
        <div class="grid grid-cols-2">
            <div
                data-aos="fade"
                data-aos-delay="150"
                data-aos-duration="2000"
                data-aos-mirror="true"
                data-aos-once="true"
                data-aos-anchor-placement="top"
            >               
                <p class="text-center text-zinc-500 tracking-widest uppercase text-sm mb-10"><a class="hover:text-zinc-400" href="/film">Film <span>ᐳ</span></a></p>
                <a href="/film" aria-label="Film">
                <div class="swiper-container slider">
                    <div class="swiper-wrapper">
                        <?php $images =  $page->slider1()->toFiles();
                        foreach($images as $image): ?>  
                        <div class="swiper-slide" data-swiper-autoplay="1500">
                            <picture>
                                <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 700, 'height' => 600, 'crop' => 'center'])->url() }}" type="image/webp">
                                <img src="{{ $image->crop(700, 600)->url() }}" alt="{{ $image->alt() }}">
                            </picture>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                </a>
            </div>
            <div
            data-aos="fade"
            data-aos-delay="200"
            data-aos-duration="1000"
            data-aos-mirror="true"
            data-aos-once="true"
            data-aos-anchor-placement="top"
            >
                
                <p class="text-center text-zinc-500 tracking-widest uppercase text-sm mb-10 wow fadeIn"><a class="hover:text-zinc-400" href="/commercial">Commercial <span>ᐳ</span></a></p>
                <a href="/commercial" aria-label="Commercial">
                <div class="swiper-container slider">
                    <div class="swiper-wrapper">
                        <?php $images =  $page->slider2()->toFiles();
                        foreach($images as $image): ?>  
                        <div class="swiper-slide" data-swiper-autoplay="2500"><img src="{{ $image->crop(700, 600)->url() }}" alt=""></div>
                        <?php endforeach ?>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="text-center text-zinc-500 text-sm mt-10 absolute inset-x-0 md:relative bottom-10 md:bottom-auto space-y-3 md:space-y-0 md:space-x-3 md:flex block justify-center"
            data-aos="fade"
            data-aos-delay="250"
            data-aos-duration="2000"
            data-aos-mirror="true"
            data-aos-once="true"
            data-aos-anchor-placement="top"
            >
            @if ($site->espana()->isNotEmpty())               
            <div> Spain +<a class="hover:text-zinc-400" href="tel:{{ $site->espana() }}" aria-label="Spain's Phone">{{ $site->espana() }}</a></div>
            <span class="hidden md:block">|</span> 
            @endif
            @if ($site->mexico()->isNotEmpty())
            <div> México +<a class="hover:text-zinc-400" href="tel:{{ $site->mexico() }}" aria-label="Mexico's Phone">{{ $site->mexico() }}</a></div>
            <span class="hidden md:block">|</span> 
            @endif
            @if ($site->mail()->isNotEmpty())
            <div><a class="hover:text-zinc-400" href="mailto:{{ $site->mail() }}" target="blank" aria-label="Email">{{ $site->mail() }}</a></div>
            @endif

        </div>
    </div>
</div>

</x-layout>

