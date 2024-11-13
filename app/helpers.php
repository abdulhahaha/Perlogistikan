<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

if (!function_exists('langData')) {
    function langData()
    {
        // Ambil bahasa dari session
        $locale = Session::get('locale', 'en');
        $filePath = resource_path("lang/lang.json");

        // Muat data JSON dan kembalikan teks sesuai bahasa
        if (File::exists($filePath)) {
            $langData = json_decode(File::get($filePath), true);
            return $langData[$locale] ?? [];
        }

        return [];
    }
}