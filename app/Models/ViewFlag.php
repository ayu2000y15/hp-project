<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewFlag extends Model
{
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'view_flags';

    /**
     * プライマリーキーの設定
     *
     * @var string
     */

    /**
     * プライマリーキーの型
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * IDの自動増分を無効化
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * タイムスタンプを更新するカラム名
     *
     * @var array
     */
    public $timestamps = true;

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'view_flg',
        'comment',
        'spare1',
        'spare2',
        'delete_flg',
    ];

    /**
     * 属性のキャスト
     *
     * @var array
     */
    protected $casts = [
        'view_flg' => 'string',
        'comment' => 'string',
        'spare1' => 'string',
        'spare2' => 'string',
        'create_at' => 'datetime',
        'update_at' => 'datetime',
        'delete_flg' => 'string',
    ];

    /**
     * 属性のデフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'delete_flg' => '0',
    ];

    /**
     * スコープ：削除されていないレコードのみを取得
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotDeleted($query)
    {
        return $query->where('delete_flg', '0');operator:
    }

    /**
     * アクセサ：コメントを取得
     *
     * @return string
     */
    public function getCommentAttribute($value)
    {
        return $value ?? '';
    }

    /**
     * ミューテタ：DEL_FLGを設定
     *
     * @param string $value
     * @return void
     */
    public function setDelFlgAttribute($value)
    {
        $this->attributes['delete_flg'] = $value ? '1' : '0';
    }
}
