<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private string $table = "comments";

    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("body");
            $table->foreignId("postId")->constrained("posts");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
