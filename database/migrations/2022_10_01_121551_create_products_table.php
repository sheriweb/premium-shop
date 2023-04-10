<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_section',100)->nullable();
            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('read_before_order')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
