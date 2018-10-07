# CoffeeManager

## setup

新規データベースを作成

.envファイルの作成

```
$ cp -p .env.example .env
```

.envを書き換え

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=データベース名
DB_USERNAME=ユーザ名
DB_PASSWORD=パスワード
```

マイグレート
```
$ php artisan migrate
```


## ルート

/login

/register

/purchase-history
