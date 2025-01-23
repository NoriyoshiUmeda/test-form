<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FashionablyLate - Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">FashionablyLate</a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Contact</h2>
      </div>

      <form class="form" method="POST" action="{{ route('contacts.confirm') }}">
        @csrf

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}" />
              @error('first_name')
                 <div style="color: red;">{{ $message }}</div>
              @enderror
              <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}" />
              @error('last_name')
                 <div style="color: red;">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--radio">
              <label>
                <input type="radio" name="gender" value="男性" {{ old('gender', '男性') == '男性' ? 'checked' : '' }} /> 男性
              </label>
              <label>
                <input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }} /> 女性
              </label>
              <label>
                <input type="radio" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }} /> その他
              </label>
              @error('gender')
                 <div style="color: red;">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
              @error('email')
                 <div style="color: red;">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="phone1" placeholder="080" value="{{ old('phone1') }}" />
              <input type="text" name="phone2" placeholder="1234" value="{{ old('phone2') }}" />
              <input type="text" name="phone3" placeholder="5678" value="{{ old('phone3') }}" />
               @error('phone1')<div style="color: red;">{{ $message }}</div>@enderror
        @error('phone2')<div style="color: red;">{{ $message }}</div>@enderror
        @error('phone3')<div style="color: red;">{{ $message }}</div>@enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
              @error('address')
                 <div style="color: red;">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--select">
              <select name="category_id" required>
                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
              @error('content')
                 <div style="color: red;">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
