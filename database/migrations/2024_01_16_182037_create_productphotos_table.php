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
        Schema::create('productphotos', function (Blueprint $table) {
            $table->id();
            $table->text('imagepath');
            $table->unsignedBigInteger('category_id');
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
         //   $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('productphotos');
    }
};
