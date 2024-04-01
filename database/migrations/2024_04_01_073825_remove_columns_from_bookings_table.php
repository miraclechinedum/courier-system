<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('pickup_location');
            $table->dropColumn('delivery_location');
            $table->dropColumn('package_details');
            $table->dropColumn('package_description');
            $table->dropColumn('quantity');
            $table->dropColumn('weight');
            $table->dropColumn('length');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('amount');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('pickup_location')->nullable();
            $table->string('delivery_location')->nullable();
            $table->text('package_details')->nullable();
            $table->string('package_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
        });
    }
}
