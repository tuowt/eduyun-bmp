<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun\Base\Ticket;

use Eduyun\Base\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * userSession/validaTicket
     * 验证用户会话 Ticket
     */
    public function validated($ticket) {
        $params = [
            'ticket' => $ticket,
        ];

        return $this->tokenHttpPostJson('userSession/validaTicket', $params);
    }
}
