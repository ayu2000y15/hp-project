@extends('layouts.app')

@section('title', 'ABOUT')

@section('content')
<div class="container about">
    <h1 class="page-title">ABOUT</h1>

    <div class="about-container">
        <div class="about-logo">
            <img src="storage/img/sample/logo.jpg">
        </div>
        <div class="about-content">
            <p>パステルライブは、Vtuber事務所です。</p>
            <p>あああああああああ</p>
            <p>ああああああああああああああ</p>
            <p>あああああああああああああ</p>
            <p>ああああああああああああああああああ</p>
        </div>
    </div>

    <div class="about-company">
        <h2 class="about-company-title">
            <span class="title-arrow">▶</span>
            COMPANY INFO
        </h2>
        <table class="about-company-info">
            @foreach ($company as $item)
            <div class="info-row">
                <div class="info-label">{{ $item["VIEW_NAME"] }}</div>
                <div class="info-value">{{ $item["ITEM"] }}</div>
            </div>
            @endforeach
        </table>
    </div>

    <div class="about-thumbnail">
        @for($i = 0; $i<10; $i++)
        <img src="storage/img/sample/sample.png">
        @endfor
    </div>
</div>
@endsection
