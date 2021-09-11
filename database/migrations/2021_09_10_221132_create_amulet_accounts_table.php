<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmuletAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amulet_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('amulettype_id')->nullable();
            $table->integer('amuletmaterial_id')->nullable();
            $table->string('year')->nullable();
            $table->string('namepra');
            $table->string('namemodel');
            $table->string('tample')->nullable();
            $table->string('rentaldate')->nullable();
            $table->time('rentaltime')->nullable();
            $table->integer('quantity');
            $table->string('placefrom')->nullable();
            $table->string('rentfrom')->nullable();
            $table->string('amuletrental');
            $table->string('shippingfee')->nullable();
            $table->string('warrantyfee')->nullable();
            $table->string('otherfee')->nullable();
            $table->text('note')->nullable();
            $table->string('totalfee');
            $table->string('pic_thambnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amulet_accounts');
    }
}
