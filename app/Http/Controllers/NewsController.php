<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // ここでニュースデータを取得し、ビューに渡すロジックを追加できます
        $newsItems = [
            ['date' => '2024.11.17', 'title' => '2024年11月17日 22:00～愛薔薇りいデビュー配信！', 'description' => '詳細...'],
            ['date' => '2024.11.17', 'title' => '2024年11月17日 22:00～愛薔薇りいデビュー配信！', 'description' => '詳細...'],

            // 他のニュースアイテムを追加
        ];
        return view('news', compact('newsItems'));
    }
}
