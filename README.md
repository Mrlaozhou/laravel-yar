## 描述
Laravel-Yar 基于PHP yar实现了Laravel完全兼容Route模式的RPC

[Yar Document](https://www.php.net/manual/zh/book.yar.php)

## 安装

```jetpack
composer install mrlaozhou/laravel-yar
```

config/app.php下加入
```jetpack
\Mrlaozhou\Yar\LaravelServiceProvider::class
```

创建 routes/yar.php文件

## Server
创建一个HTTP RPC Server
```php 
$server	= new \Mrlaozhou\Yar\Server($classInstance)
$server->handle()
```
or
```php
\Mrlaozhou\Yar\Server::boot($classInstace)
```

## Client

创建客户端实例
```php
new \Mrlaozhou\Yar\Clent()
```

调用远程服务
```php
$client->{$method}()
```
or
```php
$client->touch()
```

## concurrent

同\Yar_Concurrent_Client