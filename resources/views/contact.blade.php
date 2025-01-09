@extends('layouts.app')

@section('title', 'CONTACT')

@section('content')
<div class="container">
    <h1 class="page-title">CONTACT</h1>

    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
        @csrf
        <div class="form-row">
            <label for="inquiry_type" class="required">お問い合わせ内容</label>
            <div class="input-wrapper">
                <select id="inquiry_type" name="inquiry_type" required>
                    <option value="business">お仕事のご依頼</option>
                    <option value="audition">オーディション応募</option>
                    <option value="other">その他</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <label for="name" class="required">お名前</label>
            <div class="input-wrapper">
                <input type="text" id="name" name="name" required>
            </div>
        </div>

        <div class="form-row">
            <label for="email" class="required">メールアドレス</label>
            <div class="input-wrapper">
                <input type="email" id="email" name="email" required>
            </div>
        </div>

        <div class="form-row">
            <label for="email_confirmation" class="required">メールアドレス(確認)</label>
            <div class="input-wrapper">
                <input type="email" id="email_confirmation" name="email_confirmation" required>
            </div>
        </div>

        <div class="form-row">
            <label for="company">法人名または団体名</label>
            <div class="input-wrapper">
                <input type="text" id="company" name="company">
            </div>
        </div>

        <div class="form-row">
            <label for="subject" class="required">件名</label>
            <div class="input-wrapper">
                <input type="text" id="subject" name="subject" required>
            </div>
        </div>

        <div class="form-row">
            <label for="message" class="required">お問い合わせ内容詳細</label>
            <div class="input-wrapper">
                <textarea id="message" name="message" required></textarea>
            </div>
        </div>

        <div class="form-row checkbox-row">
            <div class="checkbox-wrapper">
                {{-- <input type="checkbox" id="privacy_policy" name="privacy_policy" required> --}}
                <label for="privacy_policy">
                    入力された個人情報の取り扱いについて、プライバシーポリシーに基づき取り扱われることに同意するものとします。
                </label>
            </div>
        </div>

        <div class="form-row">
            <div class="button-wrapper">
                <button type="submit" class="btn submit-button">
                    <img class="btn-img" src="storage/img/hp/contact-btn.png" alt="Button Image" >
                </button>
            </div>
        </div>
    </form>

    <div class="contact-notes">
        <p>ご意見や個人的なご質問、誹謗中傷に関するご報告、営業等に関しましては、返信できない可能性がございます。</p>
        <p>所属クリエイターや協力会社に情報を共有させていただく場合がございますので予めご了承ください。</p>
    </div>
</div>
@endsection


