@extends('layouts.app')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}"/>
    @endsection

    @section('content')
        <div class="contact">
            <h2>Register</h2>
        </div>

        <main>
            <form action="/thanks" method="post">
            @csrf
            <!--確認用のテーブル　th=ラベル th=入力内容-->
                <table>
                    <tr>
                        <th>お名前</th>
                          <td>{{ $contact['last_name'] }}&nbsp;{{ $contact['first_name'] }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $contact['gender'] }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $contact['email'] }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $contact['tell1'] }}{{ $contact['tell2'] }}{{ $contact['tell3'] }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $contact['address'] }}</td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td>{{ $contact['building'] }}</td>
                    </tr>
                    <tr>
                        <th>お問合せの種類</th>
                        <td>{{ $contact['inquiry'] }}</td>
                    </tr>
                    <tr>
                        <th>お問合せの内容</th>
                        <td>{{ $contact['content'] }}</td>
                    </tr>
                    
                    
            

                    
                </table>

                 @csrf
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tell1" value="{{ $contact['tell1'] }}">
        <input type="hidden" name="tell2" value="{{ $contact['tell2'] }}">
        <input type="hidden" name="tell3" value="{{ $contact['tell3'] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="inquiry" value="{{ $contact['inquiry'] }}">
        <input type="hidden" name="content" value="{{ $contact['content'] }}">

                <!--確認後の送信ボタン-->
                <div class="box">
                <div class="form__button">
                        <button class="form__button-submit" type="submit">送信</button>
                    </div>
                    </form>
                    
            <!--修正があった場合の戻るボタン-->
            <div class="correction">
                <a href="" onclick="event.preventDefault(); document.getElementById('back-form').submit();">修正</a>
                </div>
                </div>
       
    </form>
            @endsection