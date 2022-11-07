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
        Schema::create('mobiles', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('mobile_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('identity')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->string('mobile_type')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('residual')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('date');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('email_verified_at')->nullable();
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
        Schema::dropIfExists('mobiles');
    }
};
