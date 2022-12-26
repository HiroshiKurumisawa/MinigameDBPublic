<!doctype html>
<html lang="ja">
<head>

</head>
<body>
    <div>
    <form action="{{ route('room.leave_room') }}" method="post">
        <div>
        <input type="text" name="room_name" placeholder="ルーム名を入力">
        </div>
        <div>
        <input type="text" name="room_leave_user" placeholder="ユーザー名を入力してください">
        </div>
        @csrf
        <button type="submit">退出</button>
    </form>
    </div>
</body>
</html>