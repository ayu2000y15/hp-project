@extends('layouts.admin')

@section('title', 'HPデータ登録')

@section('content')
    <h2>HPデータ登録</h2>
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
            @foreach ($headerCount as $cnt)
            @if($cnt['master_id'] == $title['master_id'])
                @if($cnt['count'] <> 0 )
                <form action="{{ route('admin.data-entry.storeDataEntry') }}" method="post">
                    @csrf
                    <input type="hidden" name="header_id" id="header_id" value="{{ $title['master_id']}}">
                    <button type="submit" class="new-entry-btn" id="storeData" >データ登録</button>
                </form>
                <div class="data-table-wrapper">
                    <table class="data-table">
                        <thead>
                        <tr>
                            @foreach ($headerData as $item)
                            @if($title['master_id'] == $item->master_id)
                                <th>{{ $item->view_name }}<span class="table-required">{{ $item->required_flg ? '＊' : '' }}</span></th>
                            @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>

                            @php
                                $cnt = 10;
                            @endphp
                            @for($i = 0; $i <= $rowIdCount; $i++)
                            <tr>
                                @foreach ($data as $item)
                                @if($title['master_id'] == $item["master_id"])
                                    @if($item["row_id"] == $i)
                                        <td>
                                            <div id="view-area_{{$item["data_id"]}}">
                                                <button class="change-active-btn" id="change-active_{{$item["data_id"]}}">編集</button>
                                                {!! nl2br(e($item["data"])) !!}<br>
                                            </div>
                                            <div id="change-area_{{$item["data_id"]}}" style="display: none;">
                                                <form action="{{ route('admin.data-entry.updateData') }}" method="post">
                                                    @csrf
                                                    @if($item["type"] == "textarea")
                                                        <textarea rows="5" name="value">{!! nl2br(e($item["data"])) !!}</textarea>
                                                    @else
                                                        <input type="{{ $item["type"] }}" name="value" value="{!! nl2br(e($item["data"])) !!}">
                                                    @endif
                                                    <input type="hidden" name="data_id" value="{{ $item["data_id"] }}" >
                                                    <button class="change-btn">更新</button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                @endif
                                @endforeach
                            </tr>
                            @endfor

                        </tbody>
                    </table>
                </div>
                @else
                項目が登録されていません
                @endif
            @endif
            @endforeach
        </div>
        @endforeach
    </div>

<style>
    .data-table thead {
        position: sticky;
        top: 0;
        background-color: #f8f8f8;
        z-index: 1;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // タブ切り替えの処理
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    const newEntryBtn = document.getElementById('storeData');

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

    // form時の処理
    if (newEntryBtn) {
        newEntryBtn.addEventListener('click', () => {
            const activeTab = document.querySelector('.tab-button.active');
            if (activeTab) {
                const tabId = activeTab.getAttribute('data-tab');
                document.getElementById('header_id').value = tabId;
            }
        });
    }

    // 変更ボタンの処理を追加
    const changeButtons = document.querySelectorAll('.change-active-btn');
    changeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const dataId = this.id.split('_')[1];
            document.getElementById(`view-area_${dataId}`).style.display = 'none';
            document.getElementById(`change-area_${dataId}`).style.display = 'block';

            // 他のボタンを無効化
            changeButtons.forEach(btn => {
                if (btn !== this) {
                    btn.disabled = true;
                }
            });
        });
    });
});
</script>
@endsection

