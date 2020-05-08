<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Auth\Register;

use Eduyun\Kernel\Support;
use Eduyun\Auth\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * cert/independentAppRegister 应用用户登记
     */
    public function register($data) {
        $params = [
            'userId'       => $data['userId'],
            'loginAccount' => $data['loginAccount'],
            'phone'        => $data['phone'],
            'name'         => $data['name'],
            'gender'       => $data['gender'],
            'type'         => $data['type'],
            'orgId'        => $data['orgId'],
            'userIdentity' => $data['userIdentity'],
            'orgName'      => $data['orgName'],
            'provinceCode' => $data['provinceCode'],
            'cityCode'     => $data['cityCode'],
            'areaCode'     => $data['areaCode'],
            'province'     => $data['province'],
            'city'         => $data['city'],
            'area'         => $data['area'],
        ];

        return $this->httpPostJson('cert/independentAppRegister', $params);
    }
}
