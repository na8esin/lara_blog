# やりたいこと
- jwtを使う
- vueでspa認証
- フォーム

# route確認
php artisan route:list

# migration example
php artisan make:migration add_api_token_to_users_table --table=users

# sanctumのテスト方法
curl -H 'Accept: application/json' \
  -H 'Authorization: Bearer 20|v5RcYtQBbICZV6mvQv9zhwT0Uy4HBsOxfO7A1bI8QinvivSmaIBGnK44tBsOMXrB5MRG6Vy6yyfFvGqt' http://localhost:8000/api/sanctum/user

DBに格納されるtokenは認証するときには使えない。当たり前。

# apiのテスト方法
curl -H 'Accept: application/json' \
  -H 'Authorization: Bearer fvges36RWVSiRawV3ScF6GSAp2ofDAllqPcRjynzrqAQK2xvHQEwXRZsLxSI' http://localhost:8000/api/user
{"id":2,"name":"PQzftnuQMH","email":"OyzStt0bJc@gmail.com","email_verified_at":null,"created_at":null,"updated_at":null,"api_token":"fvges36RWVSiRawV3ScF6GSAp2ofDAllqPcRjynzrqAQK2xvHQEwXRZsLxSI"}

上を実行すると下記のソースが動く。
公式のver7のリファレンスだと見つけられない。。。
```
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
```
あと、usersテーブルにapi_tokenも追加しないといけない。

# artisan testでvar_dump
exitする