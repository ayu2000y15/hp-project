<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $talents = [
            ["talent_id" => "1",
            "image" =>"storage/img/sample/talent1.png",
            "name" => "スペシャルウィーク"],
            ["talent_id" => "2",
            "image" =>"storage/img/sample/talent2.png",
            "name" => "セイウンスカイ"],
            ["talent_id" => "3",
            "image" =>"storage/img/sample/talent3.png",
            "name" => "キングヘイロー"],
            ["talent_id" => "4",
            "image" =>"storage/img/sample/talent4.png",
            "name" => "グラスワンダー"],
            ["talent_id" => "5",
            "image" =>"storage/img/sample/talent5.png",
            "name" => "エルコンドルパサー"],
        ];

        $news = [
            ["ALT" => "ニュース１",
            "NEWS_GENRE" => "音楽",
            "NEWS_DATE" => "2025.01.04",
            "NEWS_TITLE" => "タイトル1",
            "NEWS_COMMENT" => "お知らせ内容が表示される"
            ],
            ["ALT" => "ニュース２",
            "NEWS_GENRE" => "舞台",
            "NEWS_DATE" => "2025.01.04",
            "NEWS_TITLE" => "タイトル2",
            "NEWS_COMMENT" => "お知らせ内容が表示される"
            ],
            ["ALT" => "ニュース３",
            "NEWS_GENRE" => "配信",
            "NEWS_DATE" => "2025.01.04",
            "NEWS_TITLE" => "タイトル3",
            "NEWS_COMMENT" => "お知らせ内容が表示される"
            ],
            ["ALT" => "ニュース４",
            "NEWS_GENRE" => "音楽",
            "NEWS_DATE" => "2025.01.04",
            "NEWS_TITLE" => "タイトル4",
            "NEWS_COMMENT" => "お知らせ内容が表示される"
            ],
            ["ALT" => "ニュース５",
            "NEWS_GENRE" => "音楽",
            "NEWS_DATE" => "2025.01.04",
            "NEWS_TITLE" => "タイトル5",
            "NEWS_COMMENT" => "お知らせ内容が表示される"
            ],
        ];
        return view('home', compact('talents', 'news'));
    }
}
