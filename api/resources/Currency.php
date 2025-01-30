<?php namespace Responsiv\Currency\Api\Resources;

use System\Traits\Resource;

/**
 * @api {واحد ارز} / Currency
 * @apiName Currency
 * @apiGroup Models
 *
 * @apiSuccessExample Currency Fields
 * {
 *    "name": "دلار آمریکا",
 *    "currency_code": "USD",
 *    "currency_symbol": "$",
 *    "decimal_point": ".",
 *    "thousand_separator": ",",
 *    "place_symbol_before": 1
 * }
 */
class Currency extends \Responsiv\Currency\Models\Currency {

    use Resource;
    
    protected $hidden = [
        "created_at",
        "updated_at",
        "is_enabled",
        "is_primary",
        "is_default",
        "id",
        "main_currency_id",
        "to_main_ratio",
    ];
}