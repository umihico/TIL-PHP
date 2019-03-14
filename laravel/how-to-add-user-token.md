
# Client Credentials Grant Token (採用)
+ `php artisan passport:client --password`にて`client_id`と`client_secret`発行
+ `curl -X POST -H 'Content-Type: application/json' -d '{"grant_type":"client_credentials", "client_id":"YOUR-CLIENT-ID", "client_secret":"YOUR-CLIENT-SECRET", "scope":"*"}' http://localhost:8000/oauth/token` でトークン発行
+ `curl -H 'Accept: application/json' -H 'Authorization: Bearer YOUR-TOKEN' http://localhost:8000/api/auth_test`

# Password Grant Token (不採用)
+ `localhost:8000/home`にてアカウント登録
+ `php artisan passport:client --password`にて`client_id`と`client_secret`発行
+ `curl -X POST -H 'Content-Type: application/json' -d '{"grant_type":"password", "client_id":"YOUR-CLIENT-ID", "client_secret":"YOUR-CLIENT-SECRET", "username":"YOUR-EMAIL", "password":"YOUR-PASSWORD","scope":"*"}'`でトークン発行
+ `curl -H 'Accept: application/json' -H 'Authorization: Bearer YOUR-TOKEN http://localhost:8000/api/user`　認証に成功した場合ユーザー情報が返る
+ `curl -X POST -H 'Content-Type: application/json' -d '{"grant_type":"refresh_token", "client_id":"YOUR-CLIENT-ID", "client_secret":"YOUR-CLIENT-SECRET", "scope":"*", "refresh_token":"YOUR-REFRESH-TOKEN"}' http://localhost:8000/oauth/token` でトークン再発行
