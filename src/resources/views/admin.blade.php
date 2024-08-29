@extends('layouts.app')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
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
            <span class="contact_text">Admin</span>
        </div>

        <div class="main_inner">
       <form class="admin" action="/admin" method="post">
        @csrf
    <div class="index">
       <div class="search_box">
        <input type="text" name="search" class="search" placeholder="名前やメールアドレスを入力してください" value="{{ old('search', $search) }}" />
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

    <div class="page">
       <!-- エクスポートボタン -->
    <form action="{{ route('admin.export') }}" method="POST">
        @csrf
        <!-- 検索条件を保持 -->
        <input type="hidden" name="search" value="{{ old('search', $search) }}">
        <input type="hidden" name="gender" value="{{ old('gender', $gender) }}">
        <input type="hidden" name="inquiry" value="{{ old('inquiry', $inquiry) }}">
        <input type="hidden" name="create_date" value="{{ old('create_date', $create_date) }}">
        <button type="submit" class="box">エクスポート</button>
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
            <div class="detail_button"><a href="{{ route('admin.show', $contact->id) }}" >詳細</a></div>
        </div>
        @endforeach
        </div>

        


       </div>
       </div>

     @endsection