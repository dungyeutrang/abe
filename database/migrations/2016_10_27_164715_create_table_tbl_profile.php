<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTblProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatar');
            $table->text('summary_vi');
            $table->text('profile_vi');
            $table->text('company_vi');
            $table->text('shop_showroom_vi');
            $table->text('staff_vi');
            $table->text('summary_en');
            $table->text('profile_en');
            $table->text('company_en');
            $table->text('shop_showroom_en');
            $table->text('staff_en');
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
        Schema::drop('tbl_profile');
    }
}
