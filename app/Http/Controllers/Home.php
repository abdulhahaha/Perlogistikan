<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine; // Import LanguageLine

class Home extends Controller
{
    public function index()
    {
        // Fallback values jika tidak ditemukan di database
        $fallbacks = [
            'title' => [
                'en' => 'Warehouse Management',
                'id' => 'Manajemen Gudang',
            ],
            'illustrationAlt' => [
                'en' => 'Warehouse illustration',
                'id' => 'Ilustrasi gudang',
            ],
            'manageWarehouse' => [
                'en' => 'Manage Your Warehouse with Our Solution',
                'id' => 'Atur Manajemen Gudang Anda dengan Solusi Kami',
            ],
            'optimizeWarehouse' => [
                'en' => 'Optimize your warehouse operations with advanced management solutions. Manage inventory, orders, and shipments easily through an intuitive interface.',
                'id' => 'Optimalkan operasi gudang Anda dengan solusi manajemen yang canggih. Kelola inventaris, pesanan, dan pengiriman dengan mudah melalui antarmuka yang intuitif.',
            ],
        ];

        // Mengambil terjemahan dari tabel language_lines untuk judul, deskripsi, dan ilustrasi gudang
        $title = LanguageLine::where('group', 'warehouse')->where('key', 'title')->first()?->text ?? $fallbacks['title'];
        $illustrationAlt = LanguageLine::where('group', 'warehouse')->where('key', 'warehouse_illustration')->first()?->text ?? $fallbacks['illustrationAlt'];
        $manageWarehouse = LanguageLine::where('group', 'warehouse')->where('key', 'manage_warehouse')->first()?->text ?? $fallbacks['manageWarehouse'];
        $optimizeWarehouse = LanguageLine::where('group', 'warehouse')->where('key', 'optimize_warehouse')->first()?->text ?? $fallbacks['optimizeWarehouse'];

        // Mengirimkan terjemahan ke view
        return view('home', [
            'title' => $title,
            'illustrationAlt' => $illustrationAlt,
            'manageWarehouse' => $manageWarehouse,
            'optimizeWarehouse' => $optimizeWarehouse,
        ]);
    }
}
