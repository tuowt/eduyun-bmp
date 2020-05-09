<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Base\Auth;

use Eduyun\Kernel\Support;
use Eduyun\Base\Kernel\BaseClient;

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

        $token = $this->app['config']->get("token.{$params['appId']}", 0);
        if ($token) {
            return $token;
        }

        $sign = $this->_generateSign($params);
        $params['keyInfo'] = $sign;
        if (!$sysCode) {
            $sysCode = $this->app['config']->get('sysCode', 0);
        }
        $params['sysCode'] = $sysCode;

        $result = $this->httpPostJson('apigateway/getAccessToken', $params);
        if (isset($result['retCode']) && $result['retCode'] == '000000') {
            $token = $result['data']['accessToken'];
            $this->app['config']->set("token.{$params['appId']}", $token);
        }
        return $token;
    }

    protected function _generateSign($params) {
        ksort($params);
        $accessKeySecret = $params['appKey'];
        $stringToSign = implode('', $params);

        return hash_hmac('sha1', $stringToSign, $accessKeySecret);
    }
}
