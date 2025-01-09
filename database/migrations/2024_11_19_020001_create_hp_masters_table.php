<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateHpMastersTable extends Migration
{
    public function up()
    {
        Schema::create('hp_masters', function (Blueprint $table) {
            $table->string('master_id')->primary()->comment('マスターID');
            $table->char('relation_flg', 2)->default('0')->comment('関連フラグ');
            $table->string('relation_table1')->nullable()->comment('関連テーブル1');
            $table->string('relation_table2')->nullable()->comment('関連テーブル2');
            $table->string('title')->nullable()->comment('タイトル');
            $table->string('comment')->nullable()->comment('コメント');
            $table->timestamp('created_at')->useCurrent()->comment('登録日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
            $table->char('delete_flg', 2)->default('0')->comment('削除フラグ');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `hp_masters` comment 'マスタ'");

        // データの挿入
        $data = [
            ['T001', '0', null, null, '会社情報'],
            ['T002', '0', null, null, 'ニュース'],
            ['T003', '0', null, null, 'タグ'],
            ['T004', '0', null, null, '経歴カテゴリ'],
            ['T005', '0', null, null, 'タレント情報'],
            ['T006', '1', 'T004', 'T005', 'タレント経歴'],
            ['T007', '1', 'T003', 'T005', 'タレントタグ'],
            ['T008', '0', null, null, '問い合わせカテゴリ'],
            ['T009', '1', 'T008', null, '問い合わせ情報'],
        ];

        foreach ($data as $item) {
            DB::table('hp_masters')->insert([
                'master_id' => $item[0],
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
                'relation_flg' => $item[1],
                'relation_table1' => $item[2],
                'relation_table2' => $item[3],
                'title' => $item[4],
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('hp_masters');
    }
}
