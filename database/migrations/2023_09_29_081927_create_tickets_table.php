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
        Schema::create("tickets", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->unsignedBigInteger("author_id");
            $table->foreign("author_id")->references("id")->on("users");
            $table->unsignedBigInteger("assignee_id");
            $table->foreign("assignee_id")->references("id")->on("users");
            $table->string("status");
            $table->timestamp("due_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tickets");
    }
};
