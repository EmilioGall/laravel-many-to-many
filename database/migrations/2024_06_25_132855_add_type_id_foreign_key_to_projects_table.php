<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * ALTER TABLE `projects`
     * ADD `type_id` BIGINT UNSIGNED NULLABLE
     *  AFTER `title`,
     * 
     * FOREIGN KEY `type_id` REFERENCES types(`id`);
     * 
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->unsignedBigInteger('type_id')->nullable()->after('title');

            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign('projects_type_id_foreign');

            $table->dropColumn('type_id');

        });
    }
};
