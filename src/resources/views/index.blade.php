@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
{{-- index.cssを読み込む --}}

@endsection

@section('content')
{{-- 上部アラート --}}
<div class="todo__alert">
    @if (session('message'))
        <div class="todo__alert--success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="todo__alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="todo__content">
    {{-- 新規作成欄 --}}
    <div class="section__title">
        <h2>新規作成</h2>
    </div>
    <form class="create-form" action="{{ url('/todos') }}" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="content" value="{{ old('content') }}"/>
            <select class="create-form__item-select" name="category_id">
                ß<option value="">カテゴリ</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        {{-- 作成ボタン --}}
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
    {{-- 検索欄 --}}
    <div class="section__title">
        <h2>Todo検索</h2>
    </div>
    <form action="/todos/search" class="search-form" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}" />
            <select class="search-form__item-select" name="category_id">
                <option value="">カテゴリ</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        {{-- 検索ボタン --}}
        <div class="search-form__button">
            <button class="search-form__button-submit">検索</button>
        </div>
    </form>
    {{-- Todoリストタイトル --}}
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    <span class="todo-table__header-span">Todo</span>
                    <span class="todo-table__header-span">カテゴリ</span>
                </th>
            </tr>
            {{-- 一覧表示 --}}
            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                {{-- 更新処理 --}}
                <td class="todo-table__item">
                    <form class="update-form" action="/todos/update" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <input type="text" class="update-form__item-input" name="content" value="{{ $todo['content'] }}">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">{{ $todo['category']['name'] ?? '未分類'}}</p>
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                {{-- 削除処理 --}}
                <td class="todo-table__item">
                    <form class="delete-form" action="/todos/delete" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
