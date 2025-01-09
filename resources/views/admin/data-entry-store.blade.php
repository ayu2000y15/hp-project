@extends('layouts.admin')

@section('title', 'HPデータ登録')

@section('content')
@php
    $master = session('master');
    $headerData = session('headerData');
    $data = session('data');
@endphp
    <h2>HPデータ登録</h2>
    <div class="data-form-container" id="dataForm" >
        @foreach ($master as $title)
        <h3>{{ $title['master_id'] . '：' . $title['title']  }}</h3>
        @endforeach
        <form action="{{ route('admin.data-entry.storeData') }}" method="post" class="data-form">
            @csrf
            <input type="hidden" name="header_id" id="header_id">
            <div class="form-group">
                @foreach ($headerData as $item)
                    <label for="{{ $item->view_name }}">{{ $item->view_name }}
                        <span class="required">{{ $item->required_flg == '1' ? '※必須' : '' }}</span>
                        <span class="public">{{ $item->public_flg == '1' ? '公開' : '非公開' }}</span>
                    </label>
                    @if ($item->type == "textarea")
                        <textarea rows="5" name="{{ $item->col_name }}" {{ $item->required_flg == '1' ? 'required' : '' }}></textarea>
                        <input type="hidden" name="header_id_{{ $item->col_name }}" value="{{ $item->header_id }}" >
                    @else
                        <input type="{{ $item->type }}" name="{{ $item->col_name }}" {{ $item->required_flg == '1' ? 'required' : '' }} >
                        <input type="hidden" name="header_id_{{ $item->col_name }}" value="{{ $item->header_id }}" >
                    @endif
                @endforeach
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn" id="submitBtn">登録</button>
            </div>
        </form>
    </div>


@endsection

