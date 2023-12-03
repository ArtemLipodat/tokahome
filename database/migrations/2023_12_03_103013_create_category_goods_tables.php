<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryGoodsTables extends Migration
{
    public function up()
    {
        Schema::create('category_goods', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->integer('position')->unsigned()->nullable();
            $table->nestedSet();
        });

        Schema::create('category_good_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'category_good');
        });

        Schema::create('category_good_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'category_good');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_good_revisions');
        Schema::dropIfExists('category_good_slugs');
        Schema::dropIfExists('category_goods');
    }
}
