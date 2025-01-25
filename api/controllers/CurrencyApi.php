<?php namespace Responsiv\Currency\Api\Controllers;

use Responsiv\Currency\Api\Resources\Currency;
use System\Classes\ApiController as Controller;
use Illuminate\Http\Request;

class CurrencyApi extends Controller {
    
    /**
     * @api {get} /currency/get-currencies Get Currencies
     * @apiName getCurrencies
     * @apiGroup Currency
     * @apiVersion 1.0.0
     *
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "success": true,
     *   "message": "",
     *   "dev_message": "",
     *   "results": {
     *      "currencies": ['#api-Models-Currency']
     *    }
     * }
     */
    public function getCurrencies(Request $request){
        
        return $this->success(["currencies" => Currency::where("is_enabled", true)->get()]);
    }
}