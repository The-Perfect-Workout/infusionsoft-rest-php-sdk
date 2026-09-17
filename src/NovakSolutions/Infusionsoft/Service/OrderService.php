<?php
/**
 * Created by PhpStorm.
 * User: joey
 * Date: 7/23/18
 * Time: 7:31 PM
 */

namespace NovakSolutions\Infusionsoft\Service;

use NovakSolutions\Infusionsoft\Exception\RestException;
use NovakSolutions\Infusionsoft\Model\InvoiceOrderPayment;
use NovakSolutions\Infusionsoft\Model\Order;
use NovakSolutions\Infusionsoft\Model\PaymentPlan;
use NovakSolutions\Infusionsoft\Model\Transaction;
use NovakSolutions\Infusionsoft\Registry;
use NovakSolutions\Infusionsoft\Service\Traits\RetrieveTrait;
use NovakSolutions\Infusionsoft\WebRequestResult;
use NovakSolutions\Infusionsoft\WebRequester;

class OrderService extends Service
{
    use Traits\ListTraitWithOrderBy;
    use Traits\RetrieveTrait;
//    use Traits\CreateTrait; -- not setup to use Create yet, but the Model should work with Create with a few adjustments to only include certain fields when Creating

    public static $endPoint = '/orders';
    public static $arrayKey = 'orders';
    public static $class = Order::class;

    protected static $findByFields = array(
        'paid',
        'contact_id',
        'product_id',
    );

    public static function createPayment(
        $orderId,
        $chargeNow,
        $applyToCommissions,
        $notes,
        $paymentDate,
        $paymentMethod,
        $paymentGatewayId,
        $amount,
        $creditCardId = null,
        $accessToken = null
    ) {
        $url = static::$endPoint . '/' . $orderId . '/payments';

        $body = [
            'apply_to_commissions' => $applyToCommissions,
            'charge_now' => $chargeNow,
            'notes' => $notes,
            'date' => $paymentDate,
            'payment_method_type' => $paymentMethod,
            'payment_gateway_id' => $paymentGatewayId,
            'payment_amount' => $amount,
        ];

        if ($creditCardId !== null) {
            $body['credit_card_id'] = $creditCardId;
        }

        //Make Call...
        /** @var WebRequestResult $result */
        $result = Registry::$WebRequester->request($url, 'POST', json_encode($body), $accessToken);
        static::throwExceptionIfError($result);

        $data = json_decode($result->body, true);

        return new Transaction($data);
    }

    /**
     * Update a payment that is already on an order. See https://developer.infusionsoft.com/docs/restv2/#tag/Orders/operation/updatePayment
     *
     * This is a v2 endpoint; the rest of this SDK talks to v1.
     *
     * Only the fields passed here are sent, through the endpoint's update_mask, so the rest are left alone.
     * Infusionsoft honors $amount and $paymentDate only for manually recorded payments (cash, check, and the
     * other manual types). The payment method type of an existing payment cannot be changed this way.
     *
     * @param string|int $orderId
     * @param string|int $paymentId The invoice order payment id - the `id` from Retrieve Payments, not its `payment_id`.
     * @param float|null $amount
     * @param string|null $paymentDate ISO-8601, e.g. 2024-05-21T23:00:00Z
     * @param string|null $notes
     * @param string|null $accessToken
     * @return InvoiceOrderPayment
     * @throws \NovakSolutions\Infusionsoft\Exception\BadRequestException
     * @throws \NovakSolutions\Infusionsoft\Exception\RestException
     * @throws \NovakSolutions\Infusionsoft\Exception\UnAuthorizedException
     * @throws \NovakSolutions\Infusionsoft\Exception\UnknownResponseException
     */
    public static function updatePayment(
        $orderId,
        $paymentId,
        $amount = null,
        $paymentDate = null,
        $notes = null,
        $accessToken = null
    ) {
        $body = [];

        if ($amount !== null) {
            $body['payment_amount'] = $amount;
        }
        if ($paymentDate !== null) {
            $body['payment_time'] = $paymentDate;
        }
        if ($notes !== null) {
            $body['notes'] = $notes;
        }

        if (count($body) === 0) {
            throw new RestException('updatePayment was called without anything to update');
        }

        // update_mask repeats the parameter once per field, which is how the endpoint expects a list.
        // http_build_query() would index them instead (update_mask[0]=...), which the endpoint does not read.
        $updateMask = [];
        foreach (array_keys($body) as $field) {
            $updateMask[] = 'update_mask=' . rawurlencode($field);
        }

        $url = static::$endPoint . '/' . $orderId . '/payments/' . $paymentId . '?' . implode('&', $updateMask);

        //Make Call...
        /** @var WebRequestResult $result */
        $result = Registry::$WebRequester->request($url, 'PATCH', json_encode($body), $accessToken, WebRequester::API_VERSION_2);
        static::throwExceptionIfError($result);

        $data = json_decode($result->body, true);

        return new InvoiceOrderPayment($data);
    }

    public static function replaceOrderPayPlan($orderId, PaymentPlan $paymentPlan, $accessToken = null){
        $url = static::$endPoint . '/' . $orderId . '/paymentPlan';

        //Make Call...
        /** @var WebRequestResult $result */
        $result = Registry::$WebRequester->request($url, 'PUT', json_encode($paymentPlan), $accessToken);
        static::throwExceptionIfError($result);

        return true;
    }

    public static function getOrderTransactions(
        $orderId,
        $limit = null,
        $offset = null,
        $since = null,
        $until = null,
        $accessToken = null
    ) {
        $url = static::$endPoint . '/' . $orderId . '/transactions';

        // Prep query vars
        $query = [];
        if ($limit) {
            $query['limit'] = $limit;
        }
        if ($offset) {
            $query['offset'] = $offset;
        }
        if ($since) {
            $query['since'] = $since;
        }
        if ($until) {
            $query['until'] = $until;
        }
        if (count($query) > 0) {
            $url .= '?' . http_build_query($query);
        }

        //Make Call...
        /** @var WebRequestResult $result */
        $result = Registry::$WebRequester->request($url, 'GET', [], $accessToken);
        static::throwExceptionIfError($result);

        $data = json_decode($result->body, true);
        if(isset($data['transactions']) && is_array($data['transactions'])){
            $objects = [];
            foreach($data['transactions'] as $item){
                $objects[] = new \NovakSolutions\Infusionsoft\Model\Transaction($item);
            }
            return $objects;
        }
        return [];
    }
}
