<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalentController extends Controller
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

        // ここでタレントデータを取得し、ビューに渡すロジックを追加できます
        return view('talent', compact('talents'));
    }

    public function show(){
        $talentProf = [
                "talent_name_jp" => "セイウンスカイ",
                "talent_name_en" => "Seiun Sky",
                "comment" => "いつもフワフワと、やる気が行方不明なのんびり娘。
                    しかし結構な策士で、怠惰なのは油断させるためのポーズだったり、本当に怠けているだけだったりする。
                    趣味は昼寝と釣り。猫好きでもあり、よく野原で猫と一緒に丸くなっている。
                    スペシャルウィークらと同期。",
                "birthday" => "4月26日",
                "debut" => "2025年1月5日",
                "sns_1" => "#",
                "sns_2" => "#",
                "sns_3" => "#",
                "voice_sample" => "#",
                "profile_youtube" => "https://www.youtube.com/embed/P-C71bic_1U?si=6dGAfN5GwFol_BNf"
        ];

        $schedule = [
            [
                "schedule_date" => "2024.01.01",
                "schedule-text" => "ライブ配信予定1",
                "thumbnail" => "storage/img/hp/sample.png"
            ],
            [
                "schedule_date" => "2024.01.02",
                "schedule-text" => "ライブ配信予定2",
                "thumbnail" => "storage/img/hp/sample.png"
            ],
            [
                "schedule_date" => "2024.01.03",
                "schedule-text" => "ライブ配信予定3",
                "thumbnail" => "storage/img/hp/sample.png"
            ],
        ];

        $modelImage = [
            [
                "image" => "storage/img/sample/seiunsky1.png"
            ],
            [
                "image" => "storage/img/sample/seiunsky2.png"
            ],
            [
                "image" => "storage/img/sample/seiunsky3.png"
            ],
        ];

        return view('profile', compact('talentProf', 'schedule','modelImage'));
    }

}
