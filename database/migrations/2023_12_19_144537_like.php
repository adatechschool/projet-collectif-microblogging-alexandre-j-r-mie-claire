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
    { Schema::create('likes', function (Blueprint $table) {
        $table->unsignedInteger('post_id');
        $table->unsignedInteger('user_id');
        $table->foreign('post_id')->references('id')->on('posts');
        $table->foreign('user_id')->references('id')->on('users'); // Clé étrangère liée à la table des utilisateurs
        $table->timestamps();
        $table->unique(['user_id','post_id']);
    });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {Schema::dropIfExists('likes');
        //
    }
};
