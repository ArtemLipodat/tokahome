<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTables extends Migration
{
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('manufacturer_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'manufacturer');
        });

        Schema::create('manufacturer_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'manufacturer');
        });
    }

    public function down()
    {
        Schema::dropIfExists('manufacturer_revisions');
        Schema::dropIfExists('manufacturer_slugs');
        Schema::dropIfExists('manufacturers');
    }
}
