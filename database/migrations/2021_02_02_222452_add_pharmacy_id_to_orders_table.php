<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPharmacyIdToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('orders', 'pharmacy_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('pharmacy_id')->nullable();
                $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('orders', 'pharmacy_id')){
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('pharmacy_id');
            });
        }
    }
}
