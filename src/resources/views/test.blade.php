@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/test.css') }}"/>
    <style>
    .modal {
        display: none; /* 初期状態は非表示 */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
    }

    .modal-active {
        display: block; /* モーダルを表示 */
    }
</style>
@endsection

<!--ログインに戻るボタン-->
@section('route')
    <div class="return_button">
        <form action="{{ route('login.show') }}" method="get">
            <button class="return_button-submit" type="submit">login</button>
        </form>
    </div>
@endsection

@section('content')
    <div class="contact">
        <span class="contact_text">Test</span>
    </div>

    <div class="main_inner">
        <form class="admin" action="/test" method="post">
            @csrf
            <div class="index">
                <div class="search_box">
                    <input type="text" name="look" class="search" placeholder="名前やメールアドレスを入力してください" value="{{ old('look', $look) }}" />
                    <select name="gender" class="search_gender">
                        <option value="{{ old('gender') }}" disabled selected style="display:none;">性別</option>
                        <option value="男性" @if(old('gender', $gender) === '男性') selected @endif>男性</option>
                        <option value="女性" @if(old('gender', $gender) === '女性') selected @endif>女性</option>
                        <option value="その他"  @if(old('gender', $gender) === 'その他') selected @endif>その他</option>
                    </select>
                    <select name="inquiry" class="search_categories">
                        <option value="{{ old('inquiry') }}" disabled selected style="display:none;">お問合せの種類</option>
                        <option value="商品のお届けについて"  @if(old('inquiry' , $inquiry) === '商品のお届けについて') selected @endif>商品のお届けについて</option>
                        <option value="商品の交換について" @if(old('inquiry' , $inquiry) === '商品の交換について') selected @endif>商品の交換について</option>
                        <option value="商品トラブル" @if(old('inquiry' , $inquiry) === '商品トラブル') selected @endif>商品トラブル</option>
                        <option value="ショップへのお問い合わせ" @if(old('inquiry' , $inquiry) === 'ショップへのお問合せ') selected @endif>ショップへのお問い合わせ</option>
                        <option value="その他" @if(old('inquiry' , $inquiry) === 'その他') selected @endif>商品の返還について</option>
                    </select>
                    <input type="date" name="create_date" class="search_date" value="{{ old('create_date' , $create_date) }}" placeholder="年/月/日">
                </div>
                <button class="search_button">検索</button>
                <input type="reset" class="reset" value="リセット" />
            </div>
        </form>

        <!--ページネーションリンクの表示-->
        <div class="pagination">
            {{ $contacts->links('vendor.pagination.simple-bootstrap-4') }}
        </div>
    </div>

    <div class="index_box">
        <div class="index_mene">
            <div class="index_mene_inner">
                <div class="name">お名前</div>
                <div class="gender">性別</div>
                <div class="email">メールアドレス</div>
                <div class="content">お問合せの種類</div>
            </div>
        </div>

        <div class="table">
    @foreach($contacts as $contact)
        <div class="index_content">
            <div class="name_content">{{ $contact->last_name }} {{ $contact->first_name }}</div>
            <div class="gender_content">{{ $contact->gender }}</div>
            <div class="email_content">{{ $contact->email }}</div>
            <div class="inquiry_content">{{ $contact->inquiry }}</div>
            <div class="detail_button">
                <!-- モーダルを表示するリンク -->
                <a href="{{ route('test', ['show' => $contact->id]) }}">詳細</a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- モーダル表示部分 -->
    @if(request('show'))
    @php
    $contact = $contacts->firstWhere('id', request('show'));
    @endphp
    @if($contact)
    <div class="modal-overlay">
        <div class="modal modal-active">
            <div class="modal__inner">
                <div class="modal__content">
                    <form class="modal_detail-form" action="{{ route('contact.delete', ['id' => $contact->id]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')

                        <!-- お問い合わせの詳細内容を表示 -->
                        <div class="content_box">
                            <div class="content_label">お名前: {{ $contact->last_name }} {{ $contact->first_name }}</div>
                            <div class="content_label">性別: {{ $contact->gender }}</div>
                            <div class="content_label">メールアドレス: {{ $contact->email }}</div>
                            <div class="content_label">電話番号: {{ $contact->tell }}</div>
                            <div class="content_label">住所: {{ $contact->address }}</div>
                            <div class="content_label">建物名: {{ $contact->building }}</div>
                            <div class="content_label">お問い合わせの種類: {{ $contact->inquiry }}</div>
                            <div class="content_label">お問い合わせ内容: {{ $contact->content }}</div>
                        </div>

                        <input class="modal-form__delete-btn btn" type="submit" name="delete" value="削除">
                    </form>
                    <a href="{{ route('test') }}" class="modal_close-btn">×</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>
@endsection