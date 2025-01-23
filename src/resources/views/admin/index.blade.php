@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin</h2>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('admin.index') }}" class="form-group">
        <input type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
            <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
            <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>
        <input type="date" name="created_at" value="{{ request('created_at') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}" class="btn">リセット</a>
    </form>

    <!-- エクスポートボタン -->
    <a href="{{ route('admin.export') }}" class="btn">エクスポート</a>

    <!-- テーブル -->
    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td><a href="{{ route('admin.show', $contact->id) }}" class="table-button">詳細</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">該当するデータがありません。</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- ページネーション -->
    {{ $contacts->links() }}
</div>
@endsection
