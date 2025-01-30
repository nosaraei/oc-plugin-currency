<?php namespace Responsiv\Currency\Helpers;

use Responsiv\Currency\Models\Currency as CurrencyModel;
use Responsiv\Currency\Classes\Converter as CurrencyConverter;

class Currency
{
    /**
     * Formats a number to currency.
     * @param int $number
     * @param array $options
     * @return string
     */
    public static function format($number, $options = [])
    {
        $result = $number;

        extract(array_merge([
            'in' => null,        // Currency code to display in (default fallback)
            'to' => null,        // Convert to currency
            'from' => null,      // Convert from currency (default fallback)
            'format' => null,    // Display format (long|short)
            'decimals' => null,  // Decimal override
        ], $options));

        if ($decimals === null) {
            $decimals = $format == 'short' ? 0 : 2;
        }

        $toCurrency = strtoupper($to);
        $fromCurrency = strtoupper($from);

        if ($toCurrency) {
            $result = self::convert($result, $toCurrency, $fromCurrency);
        }

        $currencyCode = $toCurrency ?: $in;

        $currencyObj = $currencyCode
            ? CurrencyModel::findByCode($currencyCode)
            : CurrencyModel::getPrimary();

        $result = $currencyObj
            ? $currencyObj->formatCurrency($result, $decimals)
            : number_format($result, $decimals);

        if ($format == 'long') {
            $result .= ' ' . ($currencyCode ?: self::primaryCode());
        }

        return $result;
    }

    public static function convert($value, $toCurrency, $fromCurrency = null)
    {
        if (!$fromCurrency) {
            $fromCurrency = self::primaryCode();
        }

        return CurrencyConverter::instance()->convert($value, $fromCurrency, $toCurrency, null);
    }

    public static function primaryCode()
    {
        return CurrencyModel::getPrimary()->currency_code;
    }
    
    public static function input($amount){
        
        return $amount;
    }
    
    public static function output($amount){
        
        return $amount;
    }
}
