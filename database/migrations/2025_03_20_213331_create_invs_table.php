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
        Schema::create('invs', function (Blueprint $table) {
            $table->id();
            $table->string('dir', 45)->nullable();
            $table->string('resguardante', 50)->nullable();
            $table->string('user', 50)->nullable();
            $table->string('gpo', 50)->nullable();
            $table->boolean('view')->default(false);
            $table->string('ni', 25)->nullable();
            $table->string('articulo', 52)->nullable();
            $table->string('marca', 31)->nullable();
            $table->string('modelo', 40)->nullable();
            $table->string('NS', 40)->nullable();
            $table->text('is_correct')->nullable();
            $table->string('nombres', 30)->nullable();
            $table->string('apa', 25)->nullable();
            $table->string('ama', 25)->nullable();
            $table->foreignId('id_user')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('ter')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invs');
    }
};
