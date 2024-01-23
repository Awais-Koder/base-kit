@inject('imageCacheService', 'App\Services\ImageCacheService')

@php
    $imageUrl = "https://www.logodesign.net/logo/disk-combined-with-camera-shutter-562ld.png?size=180x180";
    $base64Image = $imageCacheService->getCachedImage($imageUrl);
@endphp


<!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
<aside class="main-sidebar elevation-4 sidebar-light-indigo">    
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="data:image/png;base64,{{ $base64Image }}"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
