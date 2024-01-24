<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = RajaOngkir::kota()->all();

        foreach($response as $city) {
        	$data_city[] = [
        		'id' => $city['city_id'],
        		'province_id' => $city['province_id'],
        		'type' => $city['type'],
        		'city_name' => $city['city_name'],
        		'postal_code' => $city['postal_code']
        	];
        }
        City::insert($data_city);
    }
}
