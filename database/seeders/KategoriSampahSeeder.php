<?php

namespace Database\Seeders;

use App\Models\KategoriSampah;
use App\Models\RekomendasiSampah;
use Illuminate\Database\Seeder;

class KategoriSampahSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            [
                'nama' => 'Plastik PET (botol minuman)',
                'deskripsi' => 'Botol plastik bening bekas minuman kemasan.',
                'harga_per_kg' => 3000,
                'rekomendasi' => [
                    ['judul' => 'Didaur ulang jadi biji plastik', 'deskripsi' => 'Dicacah dan dilebur menjadi bijih plastik untuk bahan baku produk baru.'],
                    ['judul' => 'Dijual ke pengepul', 'deskripsi' => 'Dikumpulkan dan dijual ke pengepul besar untuk didaur ulang di pabrik.'],
                ],
            ],
            [
                'nama' => 'Plastik Kresek/Kemasan',
                'deskripsi' => 'Kantong plastik dan kemasan plastik tipis.',
                'harga_per_kg' => 1000,
                'rekomendasi' => [
                    ['judul' => 'Diolah jadi paving block', 'deskripsi' => 'Dicampur dengan bahan lain untuk membuat paving block ramah lingkungan.'],
                ],
            ],
            [
                'nama' => 'Kertas/Kardus',
                'deskripsi' => 'Kertas bekas, koran, dan kardus bekas kemasan.',
                'harga_per_kg' => 2000,
                'rekomendasi' => [
                    ['judul' => 'Didaur ulang jadi kertas baru', 'deskripsi' => 'Dilebur dan diproses ulang menjadi bubur kertas untuk produk kertas baru.'],
                    ['judul' => 'Dijual ke pengepul kertas', 'deskripsi' => 'Dijual ke pengepul yang menyalurkan ke pabrik kertas daur ulang.'],
                ],
            ],
            [
                'nama' => 'Logam/Kaleng',
                'deskripsi' => 'Kaleng minuman, kaleng makanan, dan besi bekas ringan.',
                'harga_per_kg' => 5000,
                'rekomendasi' => [
                    ['judul' => 'Dilebur jadi bahan baku logam', 'deskripsi' => 'Dilebur ulang menjadi bahan baku produk logam baru.'],
                ],
            ],
            [
                'nama' => 'Kaca',
                'deskripsi' => 'Botol kaca dan pecahan kaca bekas kemasan.',
                'harga_per_kg' => 1500,
                'rekomendasi' => [
                    ['judul' => 'Didaur ulang jadi botol baru', 'deskripsi' => 'Dilebur dan dicetak ulang menjadi kemasan kaca baru.'],
                ],
            ],
            [
                'nama' => 'Sampah Organik',
                'deskripsi' => 'Sisa makanan, sayuran, dan bahan organik lain yang mudah terurai.',
                'harga_per_kg' => 500,
                'rekomendasi' => [
                    ['judul' => 'Diolah jadi kompos', 'deskripsi' => 'Difermentasi menjadi pupuk kompos untuk pertanian atau tanaman rumahan.'],
                    ['judul' => 'Diolah jadi pakan maggot', 'deskripsi' => 'Digunakan sebagai pakan budidaya maggot BSF untuk pakan ternak.'],
                ],
            ],
            [
                'nama' => 'Residu/Tidak Layak Daur Ulang',
                'deskripsi' => 'Sampah campuran, popok, styrofoam, dan sejenisnya yang tidak bisa dimanfaatkan lagi.',
                'harga_per_kg' => 0,
                'rekomendasi' => [],
            ],
        ];

        foreach ($kategoris as $data) {
            $kategori = KategoriSampah::create([
                'bank_sampah_id' => null, // kategori global, berlaku untuk semua bank sampah
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],
                'satuan' => 'kg',
                'harga_per_kg' => $data['harga_per_kg'],
                'is_active' => true,
            ]);

            foreach ($data['rekomendasi'] as $rekom) {
                RekomendasiSampah::create([
                    'kategori_sampah_id' => $kategori->id,
                    'judul' => $rekom['judul'],
                    'deskripsi' => $rekom['deskripsi'],
                ]);
            }
        }
    }
}
