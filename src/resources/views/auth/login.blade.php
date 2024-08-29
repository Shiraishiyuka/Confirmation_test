@extends('layouts.app')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
    @endsection

    @section('route')
   <div class="register__button">
            <form action="{{ route('register.show') }}" method="get">
                <button class="register__button-submit" type="submit">register</button>
                </form>
            </div>
    @endsection

        @section('content')
        <div class="main_inner">
        <div class="contact">
            <span class="contact_text">Login</span>
        </div>

        <!--action="{{ route('login') }}"-->
            <div class="content">
                <form class="login"  action="{{ route('login') }}" method="post">
                    @csrf
                <div class="form__group">
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
          
        </div>
        <div class="login__button">
              @csrf
                <button class="login__button-submit" type="submit">ログイン</button>
            </div>

                </form>
            </div>
            </div>
            @endsection


