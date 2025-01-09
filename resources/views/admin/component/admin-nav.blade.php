<nav class="admin-nav">
    <h1 class="admin-logo">HP管理者画面</h1>
    <ul class="admin-menu">
        <li><a href="{{ route('admin') }}">ダッシュボード</a></li>
        <li><a href="{{ route('admin.data') }}">HPデータ項目設定</a></li>
        <li><a href="{{ route('admin.data-entry') }}">HPデータ登録</a></li>
        {{-- <li><a href="{{ route('admin.settings') }}">設定</a></li> --}}
    </ul>
</nav>
