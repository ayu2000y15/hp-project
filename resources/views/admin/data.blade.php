@extends('layouts.admin')

@section('title', 'HPデータ項目設定')

@section('content')
    <h2>HPデータ項目設定</h2>
    <button type="button" class="new-entry-btn" id="newEntryBtn">新規登録</button>
    <div class="data-form-container" id="dataForm" style="display: none;">
        <h3>データ項目登録・更新フォーム</h3>
        <form action="{{ route('admin.data.storeHeader') }}" method="POST" class="data-form">
            @csrf
            <button type="button" class="cancel-btn" id="cancelBtn"></button>
            <input type="hidden" name="header_id" id="header_id">
            <div class="form-group">
                <label for="master_id">マスタカテゴリ</label>
                <select id="master_id" name="master_id" required>
                    @foreach ($master as $select)
                    <option value="{{ $select['master_id'] }}">
                        {{ $select['master_id'] . ':' . $select['title'] }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="col_name">カラム名</label>
                <input type="text" id="col_name" name="col_name" required>
            </div>
            <div class="form-group">
                <label for="view_name">表示名</label>
                <input type="text" id="view_name" name="view_name" required>
            </div>
            <div class="form-group">
                <label for="type">入力タイプ</label>
                <select id="type" name="type">
                    <option value="text">text(文字列)</option>
                    <option value="textarea">textarea(1行以上の長い文章)</option>
                    <option value="number">number(数字)</option>
                    <option value="email">email(メールアドレス)</option>
                    <option value="tel">tel(電話番号)</option>
                    <option value="date">date(日付[年月日])</option>
                    <option value="month">month(日付[年月])</option>
                    <option value="number">number(数字)</option>
                    <option value="select">select(プルダウン)</option>
                    <option value="radio">radio</option>
                </select>
            </div>
            <div class="form-group">
                <label for="required_flg">必須フラグ</label>
                <label>
                    <input type="radio" name="required_flg" value="1">
                    必須項目にする
                </label>
                <label>
                    <input type="radio" name="required_flg" value="0">
                    任意項目にする
                </label>
            </div>
            <div class="form-group">
                <label for="public_flg">公開フラグ</label>
                <label>
                    <input type="radio" name="public_flg" value="1">
                    公開
                </label>
                <label>
                    <input type="radio" name="public_flg" value="0">
                    非公開
                </label>
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn" id="submitBtn">登録</button>
            </div>
        </form>
    </div>

    <div class="data-list-container">
        <h3>登録済みデータ一覧</h3>
        <div class="tabs">
            @foreach ($master as $title)
                <button class="tab-button" data-tab="{{ $title['master_id'] }}">{{ $title['master_id'] }}</button>
            @endforeach
        </div>
        @foreach ($master as $title)
        <div class="tab-content" id="tab-{{ $title['master_id'] }}">
            <h3>{{ $title['master_id'] . '：' . $title['title']  }}</h3>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>項目ID</th>
                        <th>カラム名</th>
                        <th>表示名</th>
                        <th>入力タイプ</th>
                        <th>必須フラグ</th>
                        <th>公開フラグ</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headerData as $item)
                    @if($title['master_id'] == $item->master_id)
                    <tr>
                        <td>{{ $item->header_id }}</td>
                        <td>{{ $item->col_name }}</td>
                        <td>{{ $item->view_name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->required_flg ? '必須' : '任意' }}</td>
                        <td>{{ $item->public_flg ? '公開' : '非公開' }}</td>
                        <td>
                            <button class="edit-btn" data-id="{{ $item->header_id }}"
                                    data-master-id="{{ $item->master_id }}"
                                    data-col-name="{{ $item->col_name }}"
                                    data-view-name="{{ $item->view_name }}"
                                    data-type="{{ $item->type }}"
                                    data-required-flg="{{ $item->required_flg }}"
                                    data-public-flg="{{ $item->public_flg }}">編集</button>
                            <form action="{{ route('admin.data.deleteHeader') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="header_id" value="{{ $item->header_id }}">
                                <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？');">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const form = document.querySelector('.data-form');
    const dataFormContainer = document.getElementById('dataForm');
    const newEntryBtn = document.getElementById('newEntryBtn');
    const submitBtn = document.getElementById('submitBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    //キャンセルボタンのイベントリスナー
    cancelBtn.addEventListener('click', function() {
        hideForm();
    });

    // 新規登録ボタンのイベントリスナー
    newEntryBtn.addEventListener('click', function() {
        resetForm();
        showForm();
    });

    // 編集ボタンのイベントリスナー
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const headerId = this.getAttribute('data-id');
            const masterId = this.getAttribute('data-master-id');
            const colName = this.getAttribute('data-col-name');
            const viewName = this.getAttribute('data-view-name');
            const type = this.getAttribute('data-type');
            const requiredFlg = this.getAttribute('data-required-flg');
            const publicFlg = this.getAttribute('data-public-flg');

            document.getElementById('header_id').value = headerId;
            document.getElementById('master_id').value = masterId;
            document.getElementById('col_name').value = colName;
            document.getElementById('view_name').value = viewName;
            document.getElementById('type').value = type;
            document.querySelector(`input[name="required_flg"][value="${requiredFlg}"]`).checked = true;
            document.querySelector(`input[name="public_flg"][value="${publicFlg}"]`).checked = true;

            submitBtn.textContent = '更新';
            form.action = "{{ route('admin.data.updateHeader') }}";

            showForm();
        });
    });

    function resetForm() {
        form.reset();
        document.getElementById('header_id').value = '';
        document.getElementById('master_id').value = '';
        document.getElementById('col_name').value = '';
        document.getElementById('view_name').value = '';
        document.getElementById('type').value = 'text';
        document.querySelector('input[name="required_flg"][value="1"]').checked = true;
        document.querySelector('input[name="public_flg"][value="1"]').checked = true;

        submitBtn.textContent = '登録';
        form.action = "{{ route('admin.data.storeHeader') }}";
    }

    function showForm() {
        dataFormContainer.style.display = 'block';
        dataFormContainer.scrollIntoView({ behavior: 'smooth' });
    }

    function hideForm() {
        dataFormContainer.style.display = 'none';
    }

    // タブ切り替えの処理
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');

            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            button.classList.add('active');
            document.getElementById(`tab-${tabId}`).classList.add('active');
        });
    });

    // 初期表示時に最初のタブをアクティブにする
    if (tabButtons.length > 0) {
        tabButtons[0].click();
    }
});
</script>
@endsection

