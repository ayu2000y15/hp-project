<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateHpKeysTable extends Migration
{
    public function up()
    {
        Schema::create('hp_keys', callback: function (Blueprint $table) {
            $table->integer('key_id')->primary()->autoIncrement()->comment('キーID');
            $table->string('key_name')->comment('キー名');
            $table->string('key_val')->nullable()->comment('キー値');
            $table->timestamp('created_at')->useCurrent()->comment('登録日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
            $table->char('delete_flg','2')->default('0')->comment('削除フラグ');

            $table->foreign('key_name')->references('master_id')->on('hp_masters')->onUpdate('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `hp_keys` comment 'キー管理'");
    }

    public function down()
    {
        Schema::dropIfExists('hp_keys');
    }
}
