<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class CommonService
{
        //DBから取得したデータを1行のデータに変換する
        public function dataConversion($data){
            $rowData = [];

            //master_idごとのrow_id
            foreach($data as $item){
                $rowData += [
                    $item->data_id =>
                        [
                            "master_id" => substr($item->header_id, 0, 4),
                            "row_id" => $item->row_id,
                            "data" => $item->data,
                            "view_name" => $item->view_name,
                        ],
                ];
            }

            return $rowData;
        }
    //DBから取得したデータを1行のデータに変換する(sub)
    public function dataConversionMasterId($data){
        $rowData = [];
        foreach($data as $item){
            $rowData += [
                $item->col_name =>[
                    "ITEM" => $item->data,
                    "VIEW_NAME" => $item->view_name,
                    "TYPE" => $item->type,
                    "REQUIRED_FLG" => $item->required_flg,
                ]
            ];
        }

        return $rowData;
    }
    //ファイルアップロード
    public function uploadFiles($files, $uploadDir, $talentId)
    {
            // 単一のファイルの場合は配列に変換
        if (!is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            // ファイルが有効かチェック
            if ($file->isValid()) {
                // 元のファイル名
                $originalFileName = $file->getClientOriginalName();

                // ファイルの拡張子
                $extension = $file->getClientOriginalExtension();

                // ファイルのMIMEタイプ
                $mimeType = $file->getMimeType();

                // ファイルサイズ（バイト）
                $size = $file->getSize();

                // ファイルサイズの制限（5MB）
                $maxSize = 5 * 1024 * 1024; // 5MB in bytes

                if ($size > $maxSize) {
                    \Log::warning("ファイルサイズが制限を超えています: {$originalFileName}, サイズ: {$size}");
                    continue; // 次のファイルへ
                }

                // 許可されるMIMEタイプ
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

                if (!in_array($mimeType, $allowedMimeTypes)) {
                    \Log::warning("無効なファイルタイプです: {$originalFileName}, タイプ: {$mimeType}");
                    continue; // 次のファイルへ
                }

                try {
                    // ユニークなIDを生成
                    $uniqueId = uniqid();

                    // 新しいファイル名を生成（元のファイル名 + ユニークID + 拡張子）
                    $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $uniqueId . '.' . $extension;

                    // ファイルを保存
                    $storedPath = $file->storeAs($uploadDir, $newFileName, 'public');

                    // DBへ保存
                    Image::create([
                        'FILE_NAME' => $newFileName,
                        'FILE_PATH' => 'storage/img/' . basename($uploadDir) . '/',
                        'TALENT_ID' => $talentId,
                        'VIEW_FLG' => '00', // デフォルト値
                        'PRIORITY' => 0 // デフォルト値
                    ]);

                    \Log::info("ファイルがアップロードされました: 元のファイル名: {$originalFileName}, 新しいファイル名: {$newFileName}, サイズ: {$size}, タイプ: {$mimeType}, 保存先: {$storedPath}");
                } catch (\Exception $e) {
                    \Log::error("ファイルのアップロード中にエラーが発生しました: {$originalFileName}. エラー: " . $e->getMessage());
                }
            } else {
                \Log::warning("無効なファイルです: {$file->getClientOriginalName()}");
            }
        }
        return ['success' => true, 'message' => 'ファイルが正常にアップロードされました。'];
    }

    public function deleteFile($filePath)
    {

        if (Storage::disk('public')->delete(str_replace('storage/','',$filePath))) {
            return true;
        }
        return false;
    }
}
