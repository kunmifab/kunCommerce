<?php

use App\Models\Category;
use App\Models\Currency;
use App\Models\User;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('image_path_1');
            $table->string('image_path_2')->nullable();
            $table->string('image_path_3')->nullable();
            $table->string('image_path-4')->nullable();
            $table->integer('quantity');
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Currency::class);
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
        Schema::dropIfExists('products');
    }
};
