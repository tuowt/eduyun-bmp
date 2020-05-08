<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Cert\Register;

use Eduyun\Kernel\Support;
use Eduyun\Cert\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * cert/independentAppRegister 应用用户登记
     */
    public function register($data) {
        $params = [
            'userId'       => $data['userId'],
            'loginAccount' => $data['loginAccount'],
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
        if (isset($data['phone']) && $data['phone']) {
            $params['phone'] = $data['phone'];
        }
        if (isset($data['name']) && $data['name']) {
            $params['name'] = $data['name'];
        }
        if (isset($data['gender']) && $data['gender']) {
            $params['gender'] = $data['gender'];
        }

        return $this->tokenHttpPostJson('cert/independentAppRegister', $params);
    }
}
