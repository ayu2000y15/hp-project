@extends('layouts.login')

@section('title', 'ログイン')

@section('content')
<style>
    /* ログイン画面のスタイル */
    .page-title {
        font-size: 2rem;
        text-align: center;
        margin-bottom: -20px;
    }

    .container-login {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .login {
        padding: 20px;
    }

    .form-area-login h3 {
        margin-bottom: 20px;
        color: #666;
    }

    .form-group-login {
        margin-bottom: 15px;
    }

    .form-group-login label {
        display: block;
        margin-bottom: 5px;
        color: #666;
    }

    .form-group-login input[type="text"],
    .form-group-login input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    .required {
        color: #f44336;
        margin-left: 5px;
    }

    .submit-button-login {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .submit-button-login:hover {
        background-color: #0056b3;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
    }
</style>
<div class="container-login">
    <h1 class="page-title">ログイン</h1>
        <div class="login">
            @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
            @endif

            <div class="form-area-login">
                <h3>IDとパスワードを入力してください</h3>
                <form action="{{ route('login.access') }}" onsubmit="return checkSubmit('ログイン');" method="POST">
                    @csrf
                    <div class="form-group-login">
                        <label for="name">ID<span class="required">※必須</span></label>
                        <input type="text" id="name" name="name" required />
                    </div>
                    <div class="form-group-login">
                        <label for="password">パスワード<span class="required">※必須</span></label>
                        <input type="password" id="password" name="password" required />
                    </div>
                    <button type="submit" class="submit-button-login">ログイン</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="{{ asset('js/admin-script.js') }}"></script>
@endpush
