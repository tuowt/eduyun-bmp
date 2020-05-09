<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Cert;

use Closure;
use Eduyun\Kernel\ServiceContainer;
use Eduyun\Kernel\Support;

/**
 * Class Application.
 *
 * @property \Eduyun\Cert\Register\Client $register      用户
 * @property \Eduyun\Base\Auth\Client     $auth          认证
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Register\ServiceProvider::class,
        Auth\ServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $defaultConfig = [
        'http' => [
            'base_uri' => 'http://gateway.system.eduyun.cn:40032/',
        ],
    ];

    public function getAppId() {
        $client = $this['config']->get('client');
        return $this['config']->get("clients.{$client}.appId");
    }

    public function getAppKey() {
        $client = $this['config']->get('client');
        return $this['config']->get("clients.{$client}.appKey");
    }
}
