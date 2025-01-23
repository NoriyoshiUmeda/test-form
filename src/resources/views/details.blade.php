<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>詳細情報</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>

<body>
  <div class="modal__content">
    <table class="modal__table">
      <tr><th>お名前</th><td>{{ $contact->name }}</td></tr>
      <tr><th>性別</th><td>{{ $contact->gender }}</td></tr>
      <tr><th>メールアドレス</th><td>{{ $contact->email }}</td></tr>
      <tr><th>電話番号</th><td>{{ $contact->phone }}</td></tr>
      <tr><th>住所</th><td>{{ $contact->address }}</td></tr>
      <tr><th>建物名</th><td>{{ $contact->building }}</td></tr>
      <tr><th>お問い合わせの種類</th><td>{{ $contact->inquiry_type }}</td></tr>
      <tr><th>お問い合わせ内容</th><td>{{ $contact->content }}</td></tr>
    </table>
    <form method="POST" action="{{ route('admin.delete', $contact->id) }}">
      @csrf
      @method('DELETE')
      <button type="submit" class="modal__delete">削除</button>
    </form>
    <a href="{{ route('admin.index') }}" class="modal__close">閉じる</a>
  </div>
</body>

</html>
