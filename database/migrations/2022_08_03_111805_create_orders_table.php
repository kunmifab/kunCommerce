<?php

use App\Models\Product;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('CASCADE');
            $table->foreignIdFor(Product::class);
            $table->string('escrow_status')->default('received');
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->string('billing_name_on_card');
            $table->string('billing_postalcode');
            $table->string('error')->nullable();
            $table->string('payment_gateway')->default('stripe');
            $table->integer('billing_subtotal');
            $table->integer('billing_total');
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
        Schema::dropIfExists('orders');
    }
};
