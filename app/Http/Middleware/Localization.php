<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Periksa apakah data bahasa sudah ada di session
        if (!Session::has('langData')) {
            // Baca file JSON bahasa
            $filePath = resource_path("lang/lang.json");
            $langData = [];

            if (File::exists($filePath)) {
                $langData = json_decode(File::get($filePath), true);
            }

            // Simpan data bahasa ke session
            Session::put('langData', $langData);
        }

        // Atur locale berdasarkan session
        $locale = Session::get('locale', 'en');
        \Log::info('Localization - Locale Set:', ['locale' => $locale]);
        App::setLocale($locale);

        return $next($request);
}
}