<html>
<body>
<form method="post" action="{{route('check-admin-login')}}" >
    <input type="text" name="uid">
    <input type="password" name="password">
    <input type="submit" value="Login">
    {{csrf_field()}}
</form>
</body>
</html>
