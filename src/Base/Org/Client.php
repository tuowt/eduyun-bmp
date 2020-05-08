<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Base\Org;

use Eduyun\Base\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * baseInfo/getOrgList
     * 机构列表
     */
    public function index($data = []) {
        $params = [
            'pageNo'   => 1,
            'pageSize' => 10,
        ];
        if (isset($data['provinceCode']) && $data['provinceCode']) {
            $params['provinceCode'] = $data['provinceCode'];
        }
        if (isset($data['cityCode']) && $data['cityCode']) {
            $params['cityCode'] = $data['cityCode'];
        }
        if (isset($data['areaCode']) && $data['areaCode']) {
            $params['areaCode'] = $data['areaCode'];
        }
        if (isset($data['orgId']) && $data['orgId']) {
            $params['orgId'] = $data['orgId'];
        }
        if (isset($data['orgName']) && $data['orgName']) {
            $params['orgName'] = $data['orgName'];
        }
        if (isset($data['orgType']) && $data['orgType']) {
            $params['orgType'] = $data['orgType'];
        }
        if (isset($data['eduType']) && $data['eduType']) {
            $params['eduType'] = $data['eduType'];
        }

        return $this->tokenHttpPostJson('baseInfo/getOrgList', $params);
    }
}
