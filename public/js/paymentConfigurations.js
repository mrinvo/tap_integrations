const {
    renderTapCard,
    Theme,
    Currencies,
    Direction,
    Edges,
    Locale,
    tokenize,
    resetCardInputs,
    saveCard,
    updateCardConfiguration,
    updateTheme,
    loadSavedCard
} = window.CardSDK;

/**
 * Get the checkout form payment details and initiate the payment process.
 *
 * This function retrieves customer details from input fields and configures the TapCard for payment.
 */
function getCheckoutFormPay() {
    const firstName = document.getElementById('customerFirstName').value;
    const middleName = document.getElementById('customerMiddleName').value;
    const lastName = document.getElementById('customerLastName').value;
    const email = document.getElementById('customerEmail').value;
    const countryCode = document.getElementById('customercountryCode').value;
    const phoneNumber = document.getElementById('customerPhoneNumber').value;

    // Hide the guest checkout option
    document.getElementById('checkoutTypeAsAGuest').classList.add('hidden');

    // Show the card token section after a delay
    setTimeout(() => {
        document.getElementById('cardTokenSection').classList.remove('hidden');
    }, 2000);

    let isSaveCardSelectedVar = false;

    // Render the TapCard for payment
    const { unmount } = renderTapCard('card-sdk-id', {
        publicKey: 'pk_test_kl28szXuqILSZU35rxGYQ6Fn',
        transaction: {
            amount: calcualteTotalPrice(), // Calculate the total price for the transaction
            currency: Currencies.AED
        },
        acceptance: {
            supportedBrands: ['VISA'],
            supportedCards: "ALL"
        },
        fields: {
            cardHolder: true // Display the card holder's name field
        },
        addons: {
            displayPaymentBrands: true, // Show supported payment brands
            loader: true, // Show a loading indicator
            saveCard: true // Allow the option to save the card
        },
        interface: {
            locale: Locale.EN, // Set the locale for the payment interface
            theme: Theme.LIGHT, // Set the theme for the payment interface
            edges: Edges.CURVED, // Set the card edges style
            direction: Direction.LTR // Set the text direction
        },
        customer: {
            name: [
                {
                    lang: Locale.EN,
                    first: firstName,
                    last: lastName,
                    middle: middleName
                }
            ],
            editable: true, // Allow editing of customer details
            contact: {
                email: email, // Set customer email
                phone: {
                    countryCode: countryCode, // Set customer phone country code
                    number: phoneNumber // Set customer phone number
                }
            }
        },
        onReady: () => console.log('onReady'), // Callback when the card SDK is ready
        onFocus: () => console.log('onFocus'), // Callback when the card input gains focus
        onBinIdentification: (data) => console.log('onBinIdentification', data), // Callback for BIN identification
        onValidInput: (data) => console.log('onValidInputChange', data), // Callback for valid input
        onInvalidInput: (data) => console.log('onInvalidInput', data), // Callback for invalid input
        onChangeSaveCardLater: (isSaveCardSelected) => {
            isSaveCardSelectedVar = isSaveCardSelected; // Update save card selection status
            console.log(isSaveCardSelected, " :onChangeSaveCardLater");
        },
        onError: (data) => console.log('onError', data), // Callback for errors
        onSuccess: (data) => {
            console.log('onSuccess', isSaveCardSelectedVar, data);
            // Populate the form fields with payment data
            document.getElementById('formCardId').value = data?.card?.id;
            document.getElementById('formIsSelected').value = isSaveCardSelectedVar;
            document.getElementById('formID').value = data?.id;
            document.getElementById('formDescription').value = "this is payment description";
            document.getElementById('formAmount').value = calcualteTotalPrice();
            document.getElementById('formCustomerFirstName').value = firstName;
            document.getElementById('formCustomerMiddleName').value = middleName;
            document.getElementById('formCustomerLastName').value = lastName;
            document.getElementById('formCustomerEmail').value = email;
            document.getElementById('formCustomercountryCode').value = countryCode;
            document.getElementById('formCustomerPhoneNumber').value = phoneNumber;
            document.getElementById('formPaymentType').value = 'first_payment';

            // Submit the final form
            const form = document.getElementById('finalForm');
            form.submit();
            console.log('onSuccess', isSaveCardSelectedVar, data);
        }
    });
}

/**
 * Get the saved card checkout form payment details and initiate the payment process.
 *
 * This function retrieves customer details and prepares the form for saved card payment.
 */
function getSaveCardCheckoutFormPay() {
    const firstName = document.getElementById('customerFirstName').value;
    const middleName = document.getElementById('customerMiddleName').value;
    const lastName = document.getElementById('customerLastName').value;
    const email = document.getElementById('customerEmail').value;
    const countryCode = document.getElementById('customercountryCode').value;
    const phoneNumber = document.getElementById('customerPhoneNumber').value;

    // Set recurring payment details
    document.getElementById('recurringAmount').value = calcualteTotalPrice();
    document.getElementById('recurringDescription').value = "this is payment description";

    // Show saved cards section
    document.getElementById('checkoutTypeAsAUser').classList.add('hidden');
    document.getElementById('savedCards').classList.remove('hidden');

    // Fetch saved cards for the user
    sendAsyncPostRequest();
}

/**
 * Send an asynchronous POST request to fetch saved cards for the customer.
 *
 * Retrieves saved card information based on the customer's email and populates the UI accordingly.
 */
async function sendAsyncPostRequest() {
    // Get the CSRF token from the meta tag for security
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const customer_email = document.getElementById('CardsEmail').value;
    document.getElementById('recurringCustomerEmail').value = customer_email;

    // Payload to send in the POST request
    const payload = {
        email: customer_email,
    };

    try {
        // Make an asynchronous POST request using fetch
        const response = await fetch('/payment/fetch-saved-card', {
            method: 'POST', // Specify the request method as POST
            headers: {
                'Content-Type': 'application/json', // Indicate that we are sending JSON
                'X-CSRF-TOKEN': csrfToken, // Add the CSRF token to the request headers
            },
            body: JSON.stringify(payload) // Convert the payload to a JSON string
        });

        // Check if the request was successful
        if (response.ok) {
            const data = await response.json(); // Parse the JSON response
            console.log(data);

            const responseContainer = document.getElementById('allCards');
            responseContainer.innerHTML = ''; // Clear previous content


            // Hide the element if the first item's card_id is "no"


            if (data[0].card_id === "no") {
                document.getElementById('hideComplete').style.display = 'none';
            }

            // Populate the response container with the saved card options
            data.forEach(item => {
                const postElement = document.createElement('option');
                postElement.setAttribute('value', item.card_id);
                postElement.innerHTML = `${item.bin_number}`;
                responseContainer.appendChild(postElement);


            });
        } else {
            // Handle non-200 responses
            console.log(response.status);
        }
    } catch (error) {
        // Handle network or other request errors
        document.getElementById('responseContainer').innerHTML = 'Request failed: ' + error.message;
    }
}
