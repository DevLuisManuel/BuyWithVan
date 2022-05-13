<?php

use Illuminate\Database\{Migrations\Migration, Schema\Blueprint};
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private string $table = "posts";

    public function up()
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("body");
            $table->foreignId("userId")->constrained("users");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
