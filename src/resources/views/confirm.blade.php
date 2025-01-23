<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>お問い合わせ内容確認</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
    </div>
  </header>

  <main>
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>Confirm</h2>
      </div>
      <form class="form" action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                {{ $input['first_name'] }} {{ $input['last_name'] }}
                <input type="hidden" name="first_name" value="{{ $input['first_name'] }}" >
                <input type="hidden" name="last_name" value="{{ $input['last_name'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
                {{ $input['gender'] }}
                <input type="hidden" name="gender" value="{{ $input['gender'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                {{ $input['email'] }}
                <input type="hidden" name="email" value="{{ $input['email'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                {{ $input['phone'] }}
                <input type="hidden" name="phone" value="{{ $input['phone'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                {{ $input['address'] }}
                <input type="hidden" name="address" value="{{ $input['address'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                {{ $input['building'] }}
                <input type="hidden" name="building" value="{{ $input['building'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
                @if(!empty ($input['category_id'] ))
                {{ $input['category_id'] }}
                @else
                    お問い合わせの種類が選択されていません。
                 @endif
                <input type="hidden" name="category_id" value="{{ $input['category_id'] }}" >
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                {{ $input['content'] }}
                <input type="hidden" name="content" value="{{ $input['content'] }}" >
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button type="submit" class="form__button-submit">送信</button>
          <a href="{{ route('contacts.index') }}" class="form__button-edit">修正</a>
       </form>
        </div>
    </div>
  </main>
</body>

</html>
