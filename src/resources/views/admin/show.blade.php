@extends('layouts.app')

@section('content')
<div class="container">
    <h2>お問い合わせ詳細</h2>

    <p><strong>名前:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
    <p><strong>性別:</strong> {{ $contact->gender }}</p>
    <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
    <p><strong>電話番号:</strong> {{ $contact->phone }}</p>
    <p><strong>住所:</strong> {{ $contact->address }}</p>
    <p><strong>建物名:</strong> {{ $contact->building }}</p>
    <p><strong>お問い合わせ内容:</strong> {{ $contact->content }}</p>
    <p><strong>作成日時:</strong> {{ $contact->created_at }}</p>

    <a href="{{ route('admin.index') }}">一覧に戻る</a>
</div>
@endsection
