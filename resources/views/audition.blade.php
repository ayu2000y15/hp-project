@extends('layouts.app')

@section('title', 'AUDITION')

@section('content')
<div class="container audition">
    <h1 class="page-title">AUDITION</h1>
    <div class="audition-top">
        <img class="person-img1" src="{{ asset('storage/img/sample/mayanotopgun.png') }}" alt="Talent Image 1">
        <div class="audition-content-right">
            <img class="pop-img1" src="{{ asset('storage/img/hp/audition_moji.png') }}" alt="Audition Text">
            <p>Pastel Liveでは、一緒に活躍する仲間を募集しています。</p>
            <p>『夢を叶えたい！』そんなあなたを全力でサポートします！</p>
            <p>あああああああああああああああああああああああああああ</p>
            <p>ああああああああああああああああああああああああ</p>
        </div>
    </div>

    <div class="audition-content">
        <h3>応募資格</h3>
        <ul>
            <li>満18 歳以上の健康な女性の方　※高等学校在学中の方は、ご応募いただけません。</li>
            <li>2年間以上継続的な活動が行える方</li>
            <li>週4回以上の配信または、動画投稿が可能な方</li>
            <li>特定の事務所に所属されていない方</li>
            <li>所属にあたって専属契約を交わすことが可能な方</li>
        </ul>
    </div>

    <div class="audition-content-bottom">
        <div class="audition-button-wrapper">
            <form action="{{ route('contact') }}" method="GET">
                <button type="submit" class="btn submit-button">
                    <img class="btn-img" src="{{ asset('storage/img/hp/view_more-btn.png') }}" alt="応募する">
                </button>
            </form>
        </div>
        <img class="person-img2" src="{{ asset('storage/img/sample/mayanotopgun.png') }}" alt="Talent Image 2">
    </div>
</div>
@endsection

