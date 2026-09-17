<?php

namespace NovakSolutions\Infusionsoft\Service;

use NovakSolutions\Infusionsoft\Exception\RestException;
use NovakSolutions\Infusionsoft\Model\OrderPayment;
use NovakSolutions\Infusionsoft\Registry;
use NovakSolutions\Infusionsoft\WebRequestResult;
use NovakSolutions\Infusionsoft\WebRequester;
use PHPUnit\Framework\TestCase;

/**
 * Records the calls made to it instead of talking to Infusionsoft, so the payment update can be
 * asserted on without a live application.
 */
class RecordingWebRequester extends WebRequester
{
    public $calls = [];

    public $responseBody = '{}';

    public $responseCode = 200;

    public function request($endPoint, $requestVerb, $payload = null, $accessToken = null, $apiVersion = self::API_VERSION_1)
    {
        $this->calls[] = [
            'endPoint' => $endPoint,
            'requestVerb' => $requestVerb,
            'payload' => $payload,
            'accessToken' => $accessToken,
            'apiVersion' => $apiVersion,
        ];

        $result = new WebRequestResult();
        $result->body = $this->responseBody;
        $result->responseCode = $this->responseCode;

        return $result;
    }
}

class OrderServicePaymentTest extends TestCase
{
    /** @var RecordingWebRequester */
    private $webRequester;

    public function setUp()
    {
        Registry::init();
        $this->webRequester = new RecordingWebRequester();
        Registry::$WebRequester = $this->webRequester;
    }

    public function testUpdatePaymentPatchesTheV2EndpointWithOnlyTheFieldsGiven()
    {
        $this->webRequester->responseBody = json_encode([
            'id' => '456',
            'amount' => 43.3,
            'note' => 'Check #1234',
            'invoice_id' => '789',
            'payment_id' => '321',
            'pay_time' => '2024-05-21T23:00:00Z',
            'pay_status' => 'MANUAL_PAID',
            'skip_commission' => false,
        ]);

        $payment = OrderService::updatePayment(123, 456, 43.30, '2024-05-21T23:00:00Z', 'Check #1234');

        $call = $this->webRequester->calls[0];
        $this->assertEquals('PATCH', $call['requestVerb']);
        $this->assertEquals(WebRequester::API_VERSION_2, $call['apiVersion']);
        $this->assertEquals(
            '/orders/123/payments/456?update_mask=payment_amount&update_mask=payment_time&update_mask=notes',
            $call['endPoint']
        );
        $this->assertEquals(
            ['payment_amount' => 43.30, 'payment_time' => '2024-05-21T23:00:00Z', 'notes' => 'Check #1234'],
            json_decode($call['payload'], true)
        );

        $this->assertTrue($payment instanceof OrderPayment);
        $this->assertEquals('456', $payment->id);
        $this->assertEquals(43.3, $payment->amount);
        $this->assertEquals('321', $payment->payment_id);
        $this->assertEquals('MANUAL_PAID', $payment->pay_status);
    }

    public function testUpdatePaymentLeavesOutTheFieldsThatWereNotGiven()
    {
        OrderService::updatePayment(123, 456, 43.30);

        $call = $this->webRequester->calls[0];
        $this->assertEquals('/orders/123/payments/456?update_mask=payment_amount', $call['endPoint']);
        $this->assertEquals(['payment_amount' => 43.30], json_decode($call['payload'], true));
    }

    public function testUpdatePaymentRefusesACallWithNothingToUpdate()
    {
        $this->expectException(RestException::class);

        OrderService::updatePayment(123, 456);
    }
}
