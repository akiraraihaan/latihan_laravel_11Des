<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sign in</title>
</head>
<body>
    <h1>ini page sign in</h1>
    <form method="POST" action="">
        @csrf
        <label>username</label>
        <input type="text" name="username">
        <br>
        <label>password</label>
        <input type="password" name="password">
        <button type="submit">gas</button>
    </form>
</body>
</html>
