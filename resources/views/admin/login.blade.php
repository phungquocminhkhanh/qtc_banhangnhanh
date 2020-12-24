<form action="{{ URL::to('/page/login') }}">
    <input type="text" name="account_email">
    <input type="password" name="account_password">
    <a href="{{ URL::to('/page/login/google')}}">google</a>
    <input type="submit" value="Login">
</form>
