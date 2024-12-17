<?php

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Trait SendRequestTrait
 *
 * This trait provides methods for sending payment requests using GuzzleHTTP.
 */
trait SendRequestTrait
{
    /**
     * Send a payment request to a specific endpoint.
     *
     * @param string $endpoint The endpoint that this request will be sent to
     *
     * @param array<string, FormRequest> $data The data to be sent in the request.
     * @return FormRequest The response from the payment service or an error message.
     */
    public function sendPaymentRequest($data,$endpoint,$method = 'POST')
    {
        try {



            // Create a GuzzleHTTP client.
            $client = new Client();



            // Send a request to the payment service.
            $ChargeRequest = $client->request($method, $endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('TAP_SECRET_KEY'),
                ],
                'json' => $data,
            ]);


            // Return the JSON-decoded response.
            return json_decode($ChargeRequest->getBody());

        } catch (RequestException $e) {


            // If there is an error, return the error message.
            return $e->getResponse()->getBody()->getContents();
        }
    }
}
