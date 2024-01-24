<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = RajaOngkir::provinsi()->all();

        foreach ($response as $province) {
            $data_province[] = [
                'id' => $province['province_id'],
                'name' => $province['province']
            ];
        }
        Province::insert($data_province);
    }
}
