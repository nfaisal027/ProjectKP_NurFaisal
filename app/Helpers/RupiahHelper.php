<?php

namespace App\Helpers;

class RupiahHelper
{
    public static function formatRupiah($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
