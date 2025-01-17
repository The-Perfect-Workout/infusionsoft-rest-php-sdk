<?php

namespace NovakSolutions\Infusionsoft\Service;

use NovakSolutions\Infusionsoft\Model\Order;
use NovakSolutions\Infusionsoft\Model\OrderItem;
use NovakSolutions\Infusionsoft\Model\PaymentPlan;
use NovakSolutions\Infusionsoft\Registry;
use NovakSolutions\Infusionsoft\Service\Traits\CreateTrait;
use NovakSolutions\Infusionsoft\Service\Traits\RetrieveTrait;
use NovakSolutions\Infusionsoft\WebRequestResult;

class OrderItemService extends Service
{
    public static $endPoint = '/orders';
    public static $class = OrderItem::class;

    /**
     * @throws \NovakSolutions\Infusionsoft\Exception\BadRequestException
     * @throws \NovakSolutions\Infusionsoft\Exception\RestException
     * @throws \NovakSolutions\Infusionsoft\Exception\UnAuthorizedException
     * @throws \NovakSolutions\Infusionsoft\Exception\UnknownResponseException
     */
    public static function delete($orderId, $orderItemId) {
        $url = static::$endPoint . '/' . $orderId . '/items/' . $orderItemId;
        $result = Registry::$WebRequester->request($url, 'DELETE');
        static::throwExceptionIfError($result);
        return true;
    }
}