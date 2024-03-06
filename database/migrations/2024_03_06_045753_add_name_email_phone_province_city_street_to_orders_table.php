<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameEmailPhoneProvinceCityStreetToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->after('user_id',function ($table)
            {
                $table->string('name');
                $table->string('email');
                $table->integer('phone');
                $table->string('province')->nullable();
                $table->string('city');
                $table->string('street')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('street');
        });
    }
}
