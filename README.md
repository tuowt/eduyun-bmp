# Eduyun
国家数字教育资源服务体系

## Composer 安装

```dockerfile
composer require tuowt/eduyun-bmp
```

## Usage

### 初始化Object对象
```php
use Eduyun\Factory;

$config = [
    'sysCode'     => '0', // 选填
    'client' => 'ios', //  应用ID
    'clients' => [
        'ios'=> ['appId'=>'', 'appKey'=>''],
        'iot'=> ['appId'=>'', 'appKey'=>'']
    ]
];

$app = Factory::base($config);
```

### 根据Ticket获取用户信息:

```php
$result = $app->ticket->validated($ticket);
pr($result);
```