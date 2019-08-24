## 環境構築

Docker をインストールしていない人は Docker をインストールする．

### 初回起動時

ビルドと container start

```
docker-compose build
docker-compose up
```

依存ライブラリのインストール

```
docker-compose exec web composer install
```

テーブルの作成

```
docker-compose exec db bash
cd db
./create_database.sh
```

### ２回目以降

```
docker-compose up
```

で起動できると思います．

## 開発する場合

### mysql との接続

```
docker-compose exec db mysql -u root -p$MYSQL_PASSWORD $MYSQL_DATABASE
```

### テーブルを増やす

db/sql 配下のファイルを参考にして，新規ファイル作成

```
docker-compose exec db bash
mysql -u root -p$MYSQL_PASSWORD $MYSQL_DATABASE < db/sql/(作ったファイルのパス)
```

### PHP にパッケージ加えたい

```
docker-compose exec web composer require (パッケージのなまえ)
```

(名前などは調べてください)

## deploy

頑張ってください
