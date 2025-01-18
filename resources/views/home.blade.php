@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
<style>
    .home.talent {
        background-image: url(storage/img/hp/back3.png);
        background-repeat: no-repeat;
        background-position: top;
        background-size: cover;
    }
    .home.audition {
        background-image: url(storage/img/hp/back2.png);
        background-repeat: no-repeat;
        background-position: -20px;
        background-size: cover;
    }
</style>
<div class="hero home-slide">
    <div class="slideshow">
        <img src="storage/img/sample/slide.jpg" class="slideshow-image" width="1920" height="400" alt="スライド1">
        <img src="storage/img/sample/slide2.jpg" class="slideshow-image" width="1920" height="400" alt="スライド2">
        <img src="storage/img/sample/top3.jpg" class="slideshow-image" width="1920" height="400" alt="スライド3">
        <img src="storage/img/sample/sample.png" class="slideshow-image" width="1920" height="400" alt="スライド4">
    </div>
    <div class="slideshow-dots">
        @for ($i = 0; $i < 4; $i++)
            <span class="dot @if($i === 0) active @endif" data-index="{{ $i }}"></span>
        @endfor
    </div>
</div>

<div class="home about" style="background-color: white;">
    <div class="container home">
        <h1 class="home-title about" style="color: #d7c5db;">ABOUT</h1>
        <p>パステルライブは、Vtuber事務所です。</p>
        <div class="home-button-wrapper">
            <form action="{{ route('about') }}">
                <button type="submit" class="btn submit-button">
                    <img class="home-btn-img" src="storage/img/hp/view_more-btn.png" alt="Button Image" >
                </button>
            </form>
        </div>
    </div>
</div>
<div class="home talent">
    <div class="container home">
        <h1 class="home-title talent" style="color: white;">TALENT</h1>
        <div class="talent-grid">
            @foreach($talents as $talent)
            <form action="{{ route('talent.show') }}" name="form_{{ $talent["talent_id"] }}" method="POST">
                <input type="hidden" name="talent_id" value="{{ $talent["talent_id"] }}">
                @csrf
                <button type="submit" class="talent-card-button">
                    <div class="talent-card">
                        <img src="{{ $talent['image'] }}" alt="{{ $talent['name'] }}" class="talent-image">
                        <div class="talent-name-main">{{ $talent['name'] }}</div>
                    </div>
                </button>
            </form>
            @endforeach
        </div>
        <div class="home-button-wrapper">
            <form action="{{ route('talent') }}">
                <button type="submit" class="btn submit-button">
                    <img class="home-btn-img" src="storage/img/hp/view_more-btn.png" alt="Button Image" >
                </button>
            </form>
        </div>
    </div>
</div>

<div class="home news" style="background-color: white;">
    <div class="container home">
        <h1 class="home-title news" style="color: #f2dbb8;">NEWS</h1>
        <div class="news-carousel">
            <div class="carousel-container">
                <button class="carousel-button prev">
                    <div class="carousel-arrow"></div>
                </button>
                <div class="news-items">
                @foreach($news as $item)
                    <div class="news-item">
                        <img src="storage/img/sample/sample.png" alt="{{ $item['ALT'] }}">
                        <div class="news-header">
                            <div class="news-genre">{{ $item['NEWS_GENRE'] }}</div>
                            <div class="news-date">{{ $item['NEWS_DATE'] }}</div>
                        </div>
                        <div class="news-text">{{ $item['NEWS_TITLE'] }}<br>{{ $item['NEWS_COMMENT'] }}</div>
                    </div>
                @endforeach
                </div>
                <button class="carousel-button next">
                    <span class="carousel-arrow"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="home audition">
    <div class="container home">
        <h1 class="home-title audition">AUDITION</h1>
        <div class="audition-img">
            <img class="person-img" src="storage/img/sample/mayanotopgun.png" >
            <img class="pop-img" src="storage/img/hp/audition_moji.png" >
        </div>
        <div class="home-button-wrapper">
            <form action="{{ route('audition') }}">
                <button type="submit" class="btn submit-button">
                    <img class="home-btn-img" src="storage/img/hp/view_more-btn.png" alt="Button Image" >
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slideshow = document.querySelector('.slideshow');
    const images = document.querySelectorAll('.slideshow-image');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
    let intervalId;

    function showImage(index) {
        slideshow.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
        currentIndex = index;
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    function startSlideshow() {
        intervalId = setInterval(nextImage, 5000);
    }

    function stopSlideshow() {
        clearInterval(intervalId);
    }

    // 5秒ごとに画像を切り替え
    startSlideshow();

    // ドットクリックで画像切り替え
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopSlideshow();
            showImage(index);
            startSlideshow();
        });
    });

    // // マウスがスライドショーに乗った時に一時停止
    // slideshow.addEventListener('mouseenter', stopSlideshow);

    // // マウスがスライドショーから離れた時に再開
    // slideshow.addEventListener('mouseleave', startSlideshow);

    const newsItems = document.querySelector('.news-items');
    const prevButton = document.querySelector('.carousel-button.prev');
    const nextButton = document.querySelector('.carousel-button.next');

    prevButton.addEventListener('click', () => {
        newsItems.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    });

    nextButton.addEventListener('click', () => {
        newsItems.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    });
});

</script>
@endsection

