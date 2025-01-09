@extends('layouts.app')

@section('title', 'NEWS')

@section('content')
<div class="container">
    <h1 class="page-title">NEWS</h1>

    <div class="news-grid">
        @foreach($newsItems as $item)
            <div class="news-card">
                <div class="news-card-image">
                    <img src="storage/img/hp/sample.png" alt="sample">
                </div>
                <div class="news-info">
                    <span class="date">{{ $item['date'] }}</span>
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                </div>
            </div>
            <hr class="line">
        @endforeach
    </div>
</div>
@endsection
