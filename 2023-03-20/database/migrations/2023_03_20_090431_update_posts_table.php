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
        Schema::table('posts', function(Blueprint $table) {
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->onUpdate('no action')
            ->onDelete('set null');

            $table->string('photo', 500)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->string('photo', 500)->change();
        });
    }
};
