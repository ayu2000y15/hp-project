@extends('layouts.admin')

@section('title', 'ダッシュボード')

@section('content')
    <h2>ダッシュボード</h2>
    <div class="dashboard-widgets">
        <div class="widget">
            <h3>ページ閲覧数</h3>
            <p class="widget-value">1,234</p>
        </div>
        <div class="widget">
            <h3>新規ユーザー</h3>
            <p class="widget-value">56</p>
        </div>
        <div class="widget">
            <h3>総ページ数</h3>
            <p class="widget-value">42</p>
        </div>
    </div>
    <div class="recent-activity">
        <h3>最近の活動</h3>
        <ul>
            <li>新しいページが追加されました: 「お問い合わせ」</li>
            <li>ユーザー「admin」がログインしました</li>
            <li>「サービス紹介」ページが更新されました</li>
        </ul>
    </div>
@endsection
