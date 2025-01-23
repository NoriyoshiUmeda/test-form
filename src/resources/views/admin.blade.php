<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理画面</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">FashionablyLate</h1>
      <a href="{{ route('logout') }}" class="header__logout">logout</a>
    </div>
  </header>

  <main>
    <div class="admin__content">
      <h2 class="admin__title">Admin</h2>

      <!-- 検索フォーム -->
      <form method="GET" action="{{ route('admin.index') }}" class="admin__form">
        <input type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
        <select name="gender">
          <option value="" selected>性別</option>
          <option value="全て">全て</option>
          <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
          <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
          <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="inquiry_type">
          <option value="" selected>お問い合わせの種類</option>
          @foreach($inquiryTypes as $type)
            <option value="{{ $type }}" {{ request('inquiry_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
          @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}" class="reset-button">リセット</a>
        <button type="button" onclick="window.location.href='{{ route('admin.export') }}'">エクスポート</button>
      </form>

      <!-- データ一覧 -->
      <table class="admin__table">
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
          @foreach($contacts as $contact)
          <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->inquiry_type }}</td>
            <td>
              <form method="POST" action="{{ route('admin.details', $contact->id) }}">
                @csrf
                <button type="submit">詳細</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $contacts->links() }}
    </div>
  </main>
</body>

</html>
