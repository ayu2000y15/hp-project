<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateHpDataTable extends Migration
{
    public function up()
    {
        Schema::create('hp_data', function (Blueprint $table) {
            $table->integer('data_id')->primary()->autoIncrement()->comment('データID');
            $table->string('header_id')->comment('ヘッダーID（外部キー）');
            $table->integer('row_id')->comment('行ID');
            $table->string('data')->nullable()->comment('データ');
            $table->integer('priority')->default(0)->comment('優先度');
            $table->char('public_flg', 2)->default('0')->comment('公開フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
            $table->char('delete_flg', 2)->default('0')->comment('削除フラグ');

            $table->foreign('header_id')->references('header_id')->on('hp_headers')->onUpdate('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `hp_data` comment 'データ'");
    }

    public function down()
    {
        Schema::dropIfExists('hp_data');
    }
}
