@extends('layouts.app')

@section('title', 'TALENT')

@section('content')
<div class="container talent">
    <h1 class="page-title">TALENT</h1>

    <div class="breadcrumb">
        <span class="breadcrumb-separator">▶</span>
        <span class="breadcrumb-item">セイウンスカイ</span>
    </div>

    <div class="talent-detail-container">
        <!-- メインビジュアル -->
        <div class="talent-main-visual">
            <img src="{{ asset('storage/img/sample/seiunsky3.png') }}" alt="セイウンスカイ">
        </div>

        <!-- プロフィール情報 -->
        <div class="talent-profile">
            <div class="profile-card">
                <h1 class="talent-name">{{ $talentProf["talent_name_jp"] }}</h1>
                <p class="talent-name-en">{{ $talentProf["talent_name_en"] }}</p>
                <hr>
                <p class="talent-description">
                    いつもフワフワと、やる気が行方不明なのんびり娘。
                    しかし結構な策士で、怠惰なのは油断させるためのポーズだったり、本当に怠けているだけだったりする。
                    趣味は昼寝と釣り。猫好きでもあり、よく野原で猫と一緒に丸くなっている。
                    スペシャルウィークらと同期。
                </p>

                <div class="talent-info">
                    <p>誕生日：4月26日</p>
                    <p>デビュー日：2025年1月5日</p>
                </div>

                <div class="social-links">
                    <a href="#" class="social-btn">YouTube</a>
                    <a href="#" class="social-btn">X</a>
                    <a href="#" class="social-btn">公式グッズ</a>
                </div>
                <div class="voice-sample">
                    <button class="voice-btn">ボイスサンプル</button>
                </div>

                <div class="profile-youtube">
                    <iframe width="450" height="300" src="{{ $talentProf["profile_youtube"] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
                <!-- ライブスケジュール -->
            <div class="live-schedule-section">
                <h2 class="schedule-title">LIVE SCHEDULE</h2>

                <div class="schedule-grid">
                    <div class="schedule-card" style="background-image: url('storage/img/hp/talent-live.png');">
                        <img src="{{ asset('storage/img/hp/sample.png') }}" alt="Schedule 1">
                        <p class="schedule-date">2024.01.01</p>
                        <p class="schedule-text">ライブ配信予定</p>
                    </div>
                    <div class="schedule-card" style="background-image: url('storage/img/hp/talent-live.png');">
                        <img src="{{ asset('storage/img/hp/sample.png') }}" alt="Schedule 1">
                        <p class="schedule-date">2024.01.01</p>
                        <p class="schedule-text">ライブ配信予定</p>
                    </div>
                    <div class="schedule-card" style="background-image: url('storage/img/hp/talent-live.png');">
                        <img src="{{ asset('storage/img/hp/sample.png') }}" alt="Schedule 1">
                        <p class="schedule-date">2024.01.01</p>
                        <p class="schedule-text">ライブ配信予定</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="talent-line">
    <div class="talent-model">
        <img class="model-img" src="{{ asset('storage/img/sample/seiunsky1.png') }}" alt="モデル１">
        <img class="model-img" src="{{ asset('storage/img/sample/seiunsky2.png') }}" alt="モデル２">
        <img class="model-img" src="{{ asset('storage/img/sample/seiunsky3.png') }}" alt="モデル３">
    </div>
</div>
@endsection
