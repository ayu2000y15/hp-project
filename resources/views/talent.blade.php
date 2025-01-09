@extends('layouts.app')

@section('title', 'TALENT')

@section('content')
<div class="container talent">
    <h1 class="page-title">TALENT</h1>

    <div class="button-wrapper">
        <button type="button" class="btn talent">
            <img class="btn-img" src="storage/img/hp/female-btn.png" alt="Button Image" >
        </button>
        <button type="button" class="btn talent">
            <img class="btn-img" src="storage/img/hp/male-btn.png" alt="Button Image" >
        </button>
    </div>
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
</div>
@endsection
