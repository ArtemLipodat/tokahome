<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTables extends Migration
{
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sale')->nullable();
            $table->tinyInteger('category_id')->nullable();
            $table->tinyInteger('manufacturer_id')->nullable();
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('good_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'good');
        });

        Schema::create('good_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'good');
        });
    }

    public function down()
    {
        Schema::dropIfExists('good_revisions');
        Schema::dropIfExists('good_slugs');
        Schema::dropIfExists('goods');
    }
}
