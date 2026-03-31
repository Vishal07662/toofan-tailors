<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->text('description')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });

        // order status
        Schema::create('order_states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->boolean('is_final')->default(false);
            $table->boolean('is_cancelled')->default(false);
            $table->timestamps();
        });

       Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('reference')->unique();
            $table->foreignId('created_by')->constrained('users');
            
            $table->foreignId('order_state_id')->constrained();
            $table->text('phone');
            $table->text('notes')->nullable();
            $table->decimal('order_amount', 10, 2)->default(0);
            $table->decimal('total_paid', 10, 2)->default(0);

            $table->timestamps();
        });

        // order details
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('product_id')->constrained();
            $table->string('product_name');
            $table->string('product_description')->nullable();

            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2)->default(0);

            $table->timestamps();
        });

        Schema::create('order_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            $table->foreignId('order_state_id')->constrained();
            $table->timestamps();
        });

        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            $table->string('transaction_id')->nullable();
            $table->string('payment_mode')->nullable();
            $table->text('remarks')->nullable();
            $table->decimal('amount', 10, 2);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        // Schema::dropIfExists('products');
        Schema::dropIfExists('order_states');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('order_history');
        Schema::dropIfExists('payment_history');
    }
};
