<!doctype html>
<html lang="ja">
<head>

</head>
<body>
    <div>
    <form action="{{ route('room.entry') }}" method="post">
        <div>
        <input type="text" name="room_name" placeholder="ルーム名を入力">
        </div>
        <div>
        <input type="text" name="room_password" placeholder="パスワード">
        </div>
        <div>
        <input type="text" name="room_entry_user" placeholder="ユーザー名を入力してください">
        </div>
        @csrf
        <button type="submit">入室</button>
    </form>
    </div>
</body>
</html>