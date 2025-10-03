<nav class="fixed w-full text-shadow-md z-50">
    <div class="w-3/4 lg:w-1/4 mx-auto" x-data="{ open: false }" 
         @mouseenter="open = true" 
         @mouseleave="open = false" 
         @click.away="open = false">
         
        <h1 class="text-white text-lg md:text-2xl uppercase tracking-widest text-center cursor-pointer mt-2 md:mt-8 w-full mx-auto hover:opacity-80 select-none">
            {{ site()->title() }}
        </h1>

        <ul class="text-white text-center uppercase tracking-widest text-sm"
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
        >
            @foreach (site()->children()->listed() as $subpage)
            <li class="hover:opacity-80 mt-3"><a href="{{ $subpage->url() }}" aria-label="{{ $subpage->title() }}">{{ $subpage->title() }}</a></li>
            @endforeach
            <li class="hover:opacity-80 mt-3 cursor-pointer" @click="$dispatch('open-contact'); open = false">Contacto</li>
        </ul>
    </div>

    <div x-data="{ open:false }" 
         class="flex items-center h-screen bg-black/70 backdrop-blur-sm z-50 absolute w-full inset-0" 
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0 transform"
         x-transition:enter-end="opacity-100 transform"
         x-transition:leave="transition ease-in duration-500"
         x-transition:leave-start="opacity-100 transform"
         x-transition:leave-end="opacity-0 transform"
         @open-contact.window="open = true"
         x-show="open"    
         x-cloak 
    >
        <div class="absolute right-10 top-10 text-white shadow-md">
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor" 
                class="w-6 h-6 cursor-pointer"
                @click="open = false"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>

        <ul class="text-zinc-300 text-center w-full">
            <li class="my-4"><a class="hover:text-white" href="tel:{{ site()->espana() }}" aria-label="Spain's Phone">Spain +{{ site()->espana() }}</a></li>
            <li class="my-4"><a class="hover:text-white" href="tel:{{ site()->mexico() }}" aria-label="Mexico's Phone">México +{{ site()->mexico() }}</a></li>
            <li class="my-4"><a class="hover:text-white" href="mailto:{{ site()->mail() }}" aria-label="Email">{{ site()->mail() }}</a></li>
            <li class="my-4"><a class="hover:text-white" href="mailto:{{ site()->mail2() }}" aria-label="Email">{{ site()->mail2() }}</a></li>
        </ul>
    </div>
</nav>
