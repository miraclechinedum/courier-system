<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('service_mode')->nullable();
            $table->string('courier_company')->nullable();
            $table->string('packaging_type')->nullable();
            $table->string('payment_method')->nullable();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('service_mode');
            $table->dropColumn('courier_company');
            $table->dropColumn('packaging_type');
            $table->dropColumn('payment_method');
        });
    }
}
