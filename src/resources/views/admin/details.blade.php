@extends('layouts.app')

@section('content')
<div class="container">
    <h1>お問い合わせ詳細</h1>
    <p><strong>名前:</strong> {{ $contact->name }}</p>
    <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
    <p><strong>性別:</strong> {{ $contact->gender }}</p>
    <p><strong>お問い合わせ内容:</strong> {{ $contact->content }}</p>
    <a href="{{ route('admin.index') }}">戻る</a>
</div>
@endsection
