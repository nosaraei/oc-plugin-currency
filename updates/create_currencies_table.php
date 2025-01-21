<?php namespace Responsiv\Currency\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCurrenciesTable extends Migration
{

    public function up()
    {
        Schema::create('responsiv_currency_currencies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('currency_code', 10)->index()->nullable();
            $table->string('currency_symbol', 10)->nullable();
            $table->string('decimal_point', 1)->nullable();
            $table->string('thousand_separator', 1)->nullable();
            $table->boolean('place_symbol_before')->default(true);
            $table->boolean('is_enabled')->default(false);
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_default')->default(false);
            $table->decimal('to_main_ratio', 8, 4)->nullable();
            $table->integer('main_currency_id')->nullable()->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsiv_currency_currencies');
    }

}
