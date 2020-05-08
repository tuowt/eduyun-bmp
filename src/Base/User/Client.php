<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Base\User;

use Eduyun\Kernel\Support;
use Eduyun\Base\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     *  cert/independentAppValidateUser 应用关联体系实名用户
     *
     */
    public function binding($data) {
        $params = [
            'userId'       => $data['userId'],
            'loginAccount' => $data['loginAccount'],
            'personId'     => $data['personId'],
        ];

        return $this->tokenHttpPostJson('cert/independentAppValidateUser', $params);
    }
}
