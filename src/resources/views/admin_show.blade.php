<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_show.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <title>Document</title>
    <!--書体（Inika）の追加-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="modal-content">
            <div class="cross_box">
                <div class="cross_mark">
                    <a href="/admin" class="close">&times;</a>
                </div>
            </div>

            <div class="content_box">
                <div class="content_label">
                    <div class="label_name">お名前:</div>
                    <div class="label_gender">性別</div>
                    <div class="label_email">メールアドレス</div>
                    <div class="label_tell">電話番号</div>
                    <div class="label_address">住所</div>
                    <div class="label_building">建物名</div>
                    <div class="label_inquiry">お問い合わせの種類</div>
                    <div class="label_content">お問い合わせ内容</div>
                </div>

                <div class="content">
                    <div class="content_name">{{ $contact->last_name }} {{ $contact->first_name }}</div>
                    <div class="content_gender">{{ $contact->gender }}</div>
                    <div class="content_email">{{ $contact->email }}</div>
                    <div class="content_tell">{{ $contact->tell }}</div>
                    <div class="content_address">{{ $contact->address }}</div>
                    <div class="content_building">{{ $contact->building }}</div>
                    <div class="content_inquiry">{{ $contact->inquiry }}</div>
                    <div class="content_content">{{ $contact->content }}</div>
                </div>
            </div>

            <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="submit">
                    <button type="submit">削除</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>