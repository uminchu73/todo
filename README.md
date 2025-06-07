# Todoアプリ

Todoリストの作成、更新、削除ができます。

カテゴリー分けが可能で、そのカテゴリも自身で作成、更新、削除ができます。

## Usage

```
git clone git@github.com:uminchu73/todo.git
```

```
docker-compose up -d --build
```

#### Laravelパッケージのダウンロード
```
docker-compose exec php bash
```

```
composer install
```

#### .envファイルの作成
```
cp .env.example .env
```

```
php artisan key:generate
```


#### .envファイルの修正
DB_HOST=mysql

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

に書き換える。


#### マイグレーションを実行
```
php artisan migrate
```

#### ブラウザへアクセス
http://localhost/ へアクセスする。
