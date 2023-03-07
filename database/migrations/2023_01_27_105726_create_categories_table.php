<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('icon')->nullable()->default('default_icon.svg');
            $table->string('image')->nullable()->default('default_category_image.webp');
            $table->boolean('is_new')->nullable()->default(0);
            $table->boolean('is_published')->nullable()->default(0);
            $table->integer('sort_order')->nullable()->default(10);
            //$table->boolean('is_sub')->nullable(false)->default(0);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
