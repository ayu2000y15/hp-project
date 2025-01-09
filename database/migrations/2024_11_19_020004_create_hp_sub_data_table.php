<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateHpSubDataTable extends Migration
{
    public function up()
    {
        Schema::create('hp_sub_data', callback: function (Blueprint $table) {
            $table->integer('sub_data_id')->primary()->autoIncrement()->comment('サブデータID');
            $table->string('header_id')->comment('ヘッダーID（外部キー）');
            $table->integer('data_id1')->nullable()->comment('データID1（外部キー）');
            $table->integer('data_id2')->nullable()->comment('データID2（外部キー）');
            $table->integer('row_id')->comment('行ID');
            $table->string('sub_data')->nullable()->comment('サブデータ');
            $table->integer('priority')->default(0)->comment('優先度');
            $table->char('public_flg', 2)->default('0')->comment('公開フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
            $table->char('delete_flg','2')->default('0')->comment('削除フラグ');

            $table->foreign('header_id')->references('header_id')->on('hp_headers')->onUpdate('cascade');
            $table->foreign('data_id1')->references('data_id')->on('hp_data')->onUpdate('cascade');
            $table->foreign('data_id2')->references('data_id')->on('hp_data')->onUpdate('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `hp_sub_data` comment 'サブデータ'");
    }

    public function down()
    {
        Schema::dropIfExists('hp_sub_data');
    }
}
