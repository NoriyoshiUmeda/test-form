<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id'); // 主キー
            $table->unsignedBigInteger('category_id'); // 外部キー
            $table->string('first_name', 255); // 姓
            $table->string('last_name', 255); // 名
            $table->string('gender'); // 性別 (1: 男性, 2: 女性, 3: その他)
            $table->string('email', 255); // メールアドレス
            $table->string('phone', 255); // 電話番号
            $table->string('address', 255); // 住所
            $table->string('building', 255)->nullable(); // 建物名 (nullable)
            $table->text('content'); // 詳細
            $table->timestamps(); // created_at, updated_at

            // 外部キー制約の追加
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
