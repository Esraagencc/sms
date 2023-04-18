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
        Schema::create('gorevlertablosu', function (Blueprint $table) {
            $table->id();
            $table->datetime('gorev_zamani')->default(date("Y-m-d H:i:s"));
            $table->string('notlar');
            $table->smallInteger('sms_durum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gorevlertablosu');
    }
};
