<form action="{{ URL::to('/page/login') }}">
    <input type="text" name="email">
    <input type="password" name="password">
    <a href="{{ URL::to('/page/login/google')}}">google</a>
    <input type="submit" value="Login">
</form>
