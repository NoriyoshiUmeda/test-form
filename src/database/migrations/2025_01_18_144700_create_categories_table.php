<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id'); // 自動で数字が増えるID
            $table->string('content', 255); // カテゴリ名を保存する列
            $table->timestamps(); // 作られた日と更新された日
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories'); // 必要なくなったら削除する処理
    }
}
