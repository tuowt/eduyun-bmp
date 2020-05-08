<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Cert\Auth;

use Eduyun\Kernel\Support;
use Eduyun\Cert\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     *  apigateway/getAccessToken 获取token
     */
    public function getAccessToken($sysCode = 0) {
        $params = [
            'appId'     => $this->app->getAppId(),
            'appKey'    => $this->app->getAppKey(),
            'timeStamp' => time(),
        ];

        $sign = $this->_generateSign($params);
        $params['keyInfo'] = $sign;
        if (!$sysCode) {
            $sysCode = $this->app['config']->get('sysCode', 0);
        }
        $params['sysCode'] = $sysCode;

        return $this->httpPostJson('apigateway/getAccessToken', $params);
    }

    protected function _generateSign($params) {
        ksort($params);
        $accessKeySecret = $params['appKey'];
        $stringToSign = implode('', $params);

        return hash_hmac('sha1', $stringToSign, $accessKeySecret);
    }
}
