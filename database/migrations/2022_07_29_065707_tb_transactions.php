<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transactions', function (Blueprint $table) {
            $table->id();
            $table->text('uuid');
            $table->text('name');
            $table->bigInteger('user_id');
            $table->bigInteger('product_id');
            $table->integer('amount');
            $table->integer('tax');
            $table->integer('admin_fee');
            $table->integer('total');
            $table->softDeletes()->nullable();
            $table->timestamps();
        });
    }

    /**php artisan migrate:fresh --seed
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transactions');
    }
};
