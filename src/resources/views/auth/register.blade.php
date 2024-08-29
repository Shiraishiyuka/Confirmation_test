@extends('layouts.app')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
    @endsection

     <!--ログインに戻るボタン-->
    @section('route')
   <div class="return__button">
            <form action="{{ route('login.show') }}" method="get">
                <button class="return__button-submit" type="submit">login</button>
                </form>
            </div>
    @endsection

  @section('content')
      <div class="main_inner">
        <div class="contact">
            <span class="contact_text">Register</span>
        </div>

            <div class="content">
                <form class="login" action="{{ route('register') }}" method="post">
                    @csrf
                <div class="form__group">

            <div class="form__group-content">
            <div class="login__label--item">お名前</div>
            <div class="form__input--text">
            <input type="text" name="name" class="name" placeholder="例:山田太郎" />
            <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
          </div>

            <div class="form__group-content">
            <div class="login__label--item">メールアドレス</div>
            <div class="form__input--text">
            <input type="email" name="email" class="email" placeholder="例:test@example.com" />
            <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
          </div>
        

        <div class="form__group-content">
            <div class="login__label--item">パスワード</div>
            <div class="form__input--text">
            <input type="password" name="password" class="password" placeholder="例:coachtechno6" />
            <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
          </div>
          <div class="login__button">
                <button class="login__button-submit" type="submit">ログイン</button>
            </div>
        </div>
        </div>

            
                </form>
            </div>
            </div>
            @endsection

