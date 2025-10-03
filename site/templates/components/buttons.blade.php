@props([
    'page', 
    'site', 
    'scrollThreshold' => 100, 
    'showBackButton' => true
])

<div x-data="{ show: false }" x-init="window.addEventListener('scroll', () => show = window.scrollY > {{ $scrollThreshold }})">

    <!-- Botón Ir Arriba -->
    <a 
        href="#"
        x-show="show"
        x-cloak
        x-transition
        @click.prevent="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed right-5 bottom-20 z-50 w-10 h-10 bg-black/50 flex items-center justify-center rounded-full backdrop-blur-md 
               transition transform duration-200 hover:scale-110 hover:opacity-90"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
        </svg>
    </a>

    <!-- Botón Volver Atrás -->
    @if($showBackButton)
    <a 
        href="{{ $page->parent()?->url() ?? $site->url() }}"
        x-show="show"
        x-cloak
        x-transition
        class="fixed right-5 bottom-5 z-50 w-10 h-10 bg-black/50 flex items-center justify-center rounded-full backdrop-blur-md 
               transition transform duration-200 hover:scale-110 hover:opacity-90"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 6l-6 6 6 6"/>
        </svg>
    </a>
    @endif

</div>
