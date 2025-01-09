<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateHpHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('hp_headers', function (Blueprint $table) {
            $table->string('header_id')->primary()->comment('ヘッダーID');
            $table->string('master_id')->comment('マスターID（外部キー）');
            $table->string('col_name')->nullable()->comment('カラム名');
            $table->string('view_name')->nullable()->comment('表示名');
            $table->string('type')->nullable()->comment('inputタイプ');
            $table->char('required_flg',2)->nullable()->comment('必須フラグ');
            $table->char('public_flg', 2)->default('0')->comment('公開フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
            $table->char('delete_flg', 2)->default('0')->comment('削除フラグ');

            $table->foreign('master_id')->references('master_id')->on('hp_masters')->onUpdate('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `hp_headers` comment 'ヘッダー'");
    }

    public function down()
    {
        Schema::dropIfExists('hp_headers');
    }
}
