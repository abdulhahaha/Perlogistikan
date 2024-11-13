<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class TranslationSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan terjemahan untuk judul halaman
        LanguageLine::create([
            'group' => 'warehouse', // Nama grup terjemahan
            'key' => 'title', // Kunci unik untuk terjemahan
            'text' => [
                'en' => 'Warehouse Management', // Teks terjemahan bahasa Inggris
                'id' => 'Manajemen Gudang' // Teks terjemahan bahasa Indonesia
            ],
        ]);

        // Menambahkan terjemahan untuk alt text gambar
        LanguageLine::create([
            'group' => 'warehouse',
            'key' => 'warehouse_illustration',
            'text' => [
                'en' => 'Warehouse illustration', 
                'id' => 'Ilustrasi Gudang'
            ],
        ]);

        // Menambahkan terjemahan untuk heading "Manage Your Warehouse"
        LanguageLine::create([
            'group' => 'warehouse',
            'key' => 'manage_warehouse',
            'text' => [
                'en' => 'Manage Your Warehouse with Our Solution', 
                'id' => 'Atur Manajemen Gudang Anda dengan Solusi Kami'
            ],
        ]);

        // Menambahkan terjemahan untuk deskripsi
        LanguageLine::create([
            'group' => 'warehouse',
            'key' => 'optimize_warehouse',
            'text' => [
                'en' => 'Optimize your warehouse operations with advanced management solutions. Manage inventory, orders, and shipments easily through an intuitive interface.',
                'id' => 'Optimalkan operasi gudang Anda dengan solusi manajemen yang canggih. Kelola inventaris, pesanan, dan pengiriman dengan mudah melalui antarmuka yang intuitif.'
            ],
        ]);
    }
}
