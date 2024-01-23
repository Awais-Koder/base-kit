<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



class ImageCacheService
{
    public function getCachedImage($imageUrl)
    {
        // $cacheKey = 'cached_image_' . md5($imageUrl);
    
        // if (Cache::has($cacheKey)) {
        //     // Log::info('Cache Hit... Image loaded from cache');
        //     // Get the base64 encoded image from cache
        //     return Cache::get($cacheKey);
        // } else {
        //     // Log::info('Cache miss.. Image loaded from remote');
        //     $response = Http::get($imageUrl);
    
        //     if ($response->successful()) {
        //         // Get the image content
        //         $imageContent = $response->body();
        //         // Encode the image in base64 and cache it
        //         $base64Image = base64_encode($imageContent);
        //         Cache::put($cacheKey, $base64Image, 60 * 24); // Cache for 24 hours
        //         return $base64Image;
        //     } else {
        //         // Handle error, return a default image or throw an exception
        //     }
        // }
    }
    
}
