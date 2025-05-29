@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="todo__alert">
    <div class="todo__alert--success">
        Todoを作成しました
    </div>
</div>

<div class="create-button">
<button class="create-button">作成</button>
</div>

<div class="update-button">
    <button class="update-button-submit" type="submit">更新</button>
</div>

<div class="delete-button">
    <button class="delete-button-submit" type="submit">削除</button>
</div>
