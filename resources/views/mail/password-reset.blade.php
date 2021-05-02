<a href="{{ route('password.reset', ['token' => $token]) }}">
  <!-- fill jumpable url's path parameter /{token}/ with $token, and construct url like http://your.domain/password/reset/qwerasdfzxcv 
        difined in /Users/aikawa/mylara/todos/app/Mail/ResetPassword.php.
    email.blade.php POSTs request{email,token} to
    App\Http\Controllers\Auth\ResetPasswordController@showResetForm(Request $request);, 
    which returns reset password view.
    User::sendPasswordResetNotification($token) sends this email made of this view.
  -->
  パスワード再設定リンク
</a>
