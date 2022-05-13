<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $table = "users";
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->string("username");
            $table->string("phone");
            $table->string("website");
        });
    }

    public function down():void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn("username");
            $table->dropColumn("phone");
            $table->dropColumn("website");
        });
    }
};
