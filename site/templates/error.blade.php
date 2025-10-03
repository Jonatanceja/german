@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
@endphp
<x-layout>
@include('partials.nav')
@if ($image = $page->bg()->toFile())
<div class="flex items-center bg-black h-screen bg-cover bg-center bg-no-repeat" style="background-image: url({{ $image->crop(700, 600)->url() }})">
@endif
    <div class="text-white text-center w-full">
    <p class="text-5xl uppercase tracking-widest"><strong>{{ $page->title() }}</strong></p>
    <p class="mt-2"><?= $page->text()->kti() ?></p>
    <p class="mt-5"><a class="text-zinc-400 hover:text-white" href="{{ $site->url() }}">← Volver</a></p>
    </div>  
</div>

</x-layout>
