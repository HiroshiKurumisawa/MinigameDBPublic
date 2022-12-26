<!doctype html>
<html lang="ja">
<head>

</head>
<body>
    <div>
    <form action="{{ route('user_account.login') }}" method="post">
        <div>
        <input type="text" name="user_name" placeholder="名前を入力">
        @error('user_name')
        <p style="color: red;">{{$message}}</p>
        @enderror
        </div>
        <div>
        <input type="text" name="password" placeholder="パスワードを入力してください">
        @error('password')
        <p style="color: red;">{{$message}}</p>
        @enderror
        </div>
        @csrf
        <button type="submit">アカウントログイン</button>
    </form>
    </div>
</body>
</html>