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
        // Schema::table('posts', function (Blueprint $table) {
        //     //
        // });

//         Schema::table('posts', function (Blueprint $table) {
//     $table->string('summary')->nullable();
//     $table->text('body')->nullable();
//     // etc. only new columns here
// });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
