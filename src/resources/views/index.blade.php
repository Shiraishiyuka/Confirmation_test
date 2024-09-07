@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="contact">
    <div class="contact_text">Contact</div>
</div>

<div class="main_inner">
    <form action="/confirm" method="post">
        @csrf
        <div class="form_box">

            <!-- お名前 -->
            <div class="form__group_name">
                <span class="form__label--item">お名前</span>

                <div class="form__group-content">
                    <input type="text" name="last_name" class="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                    <input type="text" name="first_name" class="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                </div>
            </div>
            <div class="form__error">
                @error('last_name')
                {{ $message }}
                @enderror
                @error('first_name')
                {{ $message }}
                @enderror
            </div>

            <!-- 性別 -->
            <div class="form__group_gender">
                <span class="form__label--gender">性別</span>

                <div class="group-gender">
                    <div class="radio_group">
                        <label class="gender"><input type="radio" name="gender" class="check" value="男性" checked />男性</label>
                    </div>
                    <div class="radio_group">
                        <label class="gender"><input type="radio" name="gender" class="check" value="女性" />女性</label>
                    </div>
                    <div class="radio_group">
                        <label class="gender"><input type="radio" name="gender" class="check" value="その他" />その他</label>
                    </div>
                </div>
            </div>
            <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="form__group_email">
                <span class="form__label--email">メールアドレス</span>

                <div class="group-email">
                    <input type="email" name="email" class="email" placeholder="例 test@example.com" value="{{ old('email') }}" />
                </div>
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>

            <!-- 電話 -->
            <div class="form__group_tell">
                <span class="form__label--tell">電話番号</span>

                <div class="group-tell">
                    <input type="text" name="tell1" class="tell1" placeholder="080" />
                    <div class="text">-</div>
                    <input type="text" name="tell2" class="tell2" placeholder="1234" />
                    <div class="text">-</div>
                    <input type="text" name="tell3" class="tell3" placeholder="5678" />
                </div>
            </div>
            <div class="form__error">
                @error('tell1')
                {{ $message }}
                @enderror
                @error('tell2')
                {{ $message }}
                @enderror
                @error('tell3')
                {{ $message }}
                @enderror
            </div>

            <!-- 住所 -->
            <div class="form__group_address">
                <span class="form__label--address">住所</span>

                <div class="group-address">
                    <input type="text" name="address" class="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
            </div>
            <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
            </div>

            <!-- 建物名 -->
            <div class="form__group_building">
                <div class="form__label--building">建物名</div>

                <div class="group-building">
                    <input type="text" name="building" class="building" placeholder="例:千駄田ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
            <div class="form__error">
                @error('building')
                {{ $message }}
                @enderror
            </div>

            <!-- 問い合わせの種類 -->
            <div class="form__group_inquiry">
                <span class="form__label--inquiry">お問合せの種類</span>

                <div class="group-inquiry">
                    <select name="category_id" class="inquiry" id="">
                        <option disabled selected style="display:none;">選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">
                @error('category_id')
                {{ $message }}
                @enderror
            </div>

            <!-- 問い合わせの内容 -->
            <div class="form__group_content">
                <span class="form__label--content">お問合せの内容</span>

                <div class="form__input--form-textarea">
                    <textarea name="content" class="content" placeholder="お問合せの内容をご記載ください">{{ old('content') }}</textarea> <!-- 修正 -->
                </div>
            </div>
            <div class="form__error">
                @error('content')
                {{ $message }}
                @enderror
            </div>

            <!-- 確認ボタン -->
        </div>
        <div class="button">
            <button class="button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection