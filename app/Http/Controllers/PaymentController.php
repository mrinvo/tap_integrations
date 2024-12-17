<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostedRequest;
use App\Http\Requests\InvoiceRequest;
use App\Repositories\PaymentRepository;
use App\Http\Requests\ValidateInitialRequest;
use App\Models\Customer;
use App\Models\CustomerCards;
use App\Services\PaymentService;
use Illuminate\Http\Request;

/**
 * Class PaymentController
 *
 * Handles payment-related actions within the application, such as initiating payment requests and processing responses.
 *
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * The PaymentRepository instance used for handling payment-related database operations.
     *
     * @var PaymentRepository
     */
    protected $PaymentRepository;

    /**
     * PaymentController constructor.
     *
     * @param PaymentRepository $requestRepository The PaymentRepository instance for processing payment requests.
     */
    public function __construct(PaymentRepository $requestRepository)
    {
        $this->PaymentRepository = $requestRepository;
    }

    /**
     * Initiate a charge payment request.
     *
     * Processes the hosted payment request and returns a response, which may include a redirection to the payment gateway.
     *
     * @param Request $request The hosted payment request object.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response The response, which may include a redirection or a direct response.
     */
    public function initiateChargeRequest(Request $request)
    {
        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        // Check if a redirect URL is provided in the response and redirect the user if available.
        return (isset($response->transaction->url))
            ? redirect($response->transaction->url)
            : view('error', compact('response'));
    }

    /**
     * Initiate a recurring payment request.
     *
     * Processes the hosted payment request and displays success or error view based on the response.
     *
     * @param Request $request The hosted payment request object.
     *
     * @return \Illuminate\Http\Response The success or error view based on the payment response.
     */
    public function initiateRecurringRequest(Request $request)
    {
        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);
        $message = 'Merchant Initiated Transaction';

        // Check if the response indicates success and return the corresponding view.
        return ($response->gateway->response->code == "0")
            ? view('success', compact('response', "message"))
            : view('error', compact('response', "message"));
    }

    /**
     * Handle the redirect response from the payment gateway.
     *
     * Processes the redirect response and displays success or error view based on the response.
     *
     * @param Request $request The request object containing the redirect response data.
     *
     * @return \Illuminate\Http\Response The success or error view based on the payment response.
     */
    public function handleRedirectResponse(Request $request)
    {
        // Process the redirect response using the PaymentRepository.
        $fullResponse = $this->PaymentRepository->processRedirectResponse($request);
        $response = $fullResponse['response'];
        $message = $fullResponse['message'];

        // Check if the response indicates success and return the corresponding view.
        return ($response->gateway->response->code == "0")
            ? view('success', compact('response', "message"))
            : view('error', compact('response', "message"));
    }

    /**
     * Fetch saved cards for a specific customer based on their email.
     *
     * Retrieves saved card information for the customer associated with the given email.
     *
     * @param Request $request The request object containing the customer's email.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array The collection of saved cards or a message if no cards are found.
     */
    public function fetchSavedCard(Request $request)
    {
        // Find the customer by their email.
        $customer = Customer::where('email', $request->email)->first();

        if (isset($customer)) {
            // Retrieve the saved cards for the found customer.
            $cards = CustomerCards::where('customer_email', $customer->email)->get();
            return $cards;
        } else {
            // Return a message if no customer is found.
            return [['bin_number' => 'No cards saved for this email', 'card_id' => 'no']];
        }
    }
}
