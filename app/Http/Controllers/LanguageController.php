<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        // Validasi bahasa yang didukung
        if (!in_array($locale, ['en', 'id'])) {
            $locale = 'en'; // Bahasa default jika bahasa tidak valid
        }

        // Simpan pilihan bahasa ke session
        Session::put('locale', $locale);
        App::setLocale($locale);

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
