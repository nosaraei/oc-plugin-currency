<?php namespace Responsiv\Currency;

use October\Rain\Database\Updates\Seeder;
use Responsiv\Currency\Models\Currency;

class SeedAllTables extends Seeder
{

    public function run()
    {
        Currency::create([
            //'name' => 'U.S. Dollar',
            'name' => 'دلار آمریکا',
            'currency_code' => 'USD',
            'currency_symbol' => '$',
            'decimal_point' => '.',
            'thousand_separator' => ',',
            'place_symbol_before' => true,
            'is_enabled' => false,
            'is_primary' => false,
            'is_default' => false,
        ]);

        Currency::create([
            //'name' => 'Euro',
            'name' => 'یورو',
            'currency_code' => 'EUR',
            'currency_symbol' => '€',
            'decimal_point' => '.',
            'thousand_separator' => ',',
            'place_symbol_before' => true,
            'is_enabled' => false,
            'is_primary' => false,
            'is_default' => false,
        ]);

        Currency::create([
            //'name' => 'Pound Sterling',
            'name' => 'پوند بریتانیا',
            'currency_code' => 'GBP',
            'currency_symbol' => '£',
            'decimal_point' => '.',
            'thousand_separator' => ',',
            'place_symbol_before' => true,
            'is_enabled' => false,
            'is_primary' => false,
            'is_default' => false,
        ]);

        $IRR = Currency::create([
            'name' => 'ریال',
            'currency_code' => 'IRR',
            'currency_symbol' => 'ريال',
            'decimal_point' => '.',
            'thousand_separator' => ',',
            'place_symbol_before' => false,
            'is_enabled' => true,
            'is_primary' => true,
            'is_default' => false,
        ]);
    
        Currency::create([
            'name' => 'تومان',
            'currency_code' => 'IRR-T',
            'currency_symbol' => 'تومان',
            'decimal_point' => '.',
            'thousand_separator' => ',',
            'place_symbol_before' => false,
            'is_enabled' => true,
            'is_primary' => false,
            'is_default' => true,
            'to_main_ratio' => 0.1,
            'main_currency_id' => $IRR->id
        ]);
    }

}