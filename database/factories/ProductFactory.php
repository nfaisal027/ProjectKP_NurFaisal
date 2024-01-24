<?php

namespace Database\Factories;

use App\Models\brand;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => category::factory()->create(),
            'brand_id' => brand::factory()->create(),
            'name' => 'Asus Rog Mantap Jiwa',
            'slug' => 'asus-rog-mantap-jiwa',
            'price' => 1000000,
            'stock' => 3,
            'berat' => 1000,
            'spesifikasi' => 
            '👉 ACER NITRO AN515-51
            Desain laptop kece banget kokoh dan berforma tinggi cocok banget nih Untuk Editing, rendering dan pastinya Gaming 😇
            
            👉SPESIFIKASI :
            ▪Processor Core i7-7700HQ @2.8GHz
            ▪VGA Intel UHD Graphics 630 + NVIDIA Geforce GTX 1050Ti
            ▪LED 15inch FHD (1920 x 1080)
            ▪RAM 8GB DDR4 2133MHz
            ▪SSD 512GB
            🔸Backlit Keyboard Red
            🔸Baterai 4 Cells Lithium-Pymer 4000 mAh 59 Whrs
            
            👉KONDISI :
            🔸Body mulus 97%
            🔸Telah lulus quality control product. (Cek fungsi ,fisik ,dan performa)',
            'img1' => '',
            'img2' => '',
            'img3' => '',
            'img4' => '',
        ];
    }
}
