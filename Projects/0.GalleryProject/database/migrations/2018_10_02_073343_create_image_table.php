<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
      Schema::enableForeignKeyConstraints();

      Schema::create('images', function (Blueprint $table) {
          $table->increments('id_image');
          $table->string('image_name');
          $table->string('image_comments');
          $table->unsignedInteger('id_user');
          $table->unsignedInteger('id_category');
          $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
          $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('cascade');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
        // Schema::table('images', function(Blueprint $table) {
        //   $table->dropForeign('images_id_user_foreign');
        //   $table->dropForeign('images_id_category_foreign');
        // });

    }
}
