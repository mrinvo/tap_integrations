<!DOCTYPE html>
<html>
    <head>
    <title>Tap</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel ="stylesheet" href="/css/HomePage.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://tap-sdks.b-cdn.net/card/1.0.0-beta/index.js"></script>
        <script>

        </script>

    </head>

    <body>
        <header>
        <div class="container">
            <div class="headerContainer">
                <div class="brandingDiv">
                    <h1 class="brandingName"><span class="logoHighlight">Tap</span> Payments</h1>
                </div>
                <nav class="pagesNaveInHeader">
                    <ul>
                        <li class="current"><a href="/">Home</a></li>
                        {{-- <li><a href="about.html">About</a></li>
                        <li><a href="services.html">Services</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
        </header>



        {{-- <section id="products" class="fixedParagraph">
            <div class="container">
                <div  class="paraContainer">
                    <div class="boxes">
                        <img src="/logo_html.png" alt="html iamge">
                        <h3>Product 1</h3>
                        <h4>Price: 40 AED</h4>
                        <button type="button" class="productPriceButton productPriceButtonAdd productPriceButtonAdd-1" data-id="1" onclick="addToCart(event, '30', '1')"> Add TO Cart </button>
                        <button type="button" class="productPriceButton productPriceButtonRemove productPriceButtonRemove-1 hidden" onclick="removeFromCart(event, '1')"> Remove From Cart </button>
                    </div>
                    <div class="boxes">
                        <img src="/logo_css.png" alt="css3 iamge">
                        <h3>Product 2</h3>
                        <h4>Price: 50 AED</h4>
                        <button type="button" class="productPriceButton productPriceButtonAdd productPriceButtonAdd-2" data-id="2" onclick="addToCart(event, '50', '2')"> Add TO Cart </button>
                        <button type="button" class="productPriceButton productPriceButtonRemove productPriceButtonRemove-2 hidden" onclick="removeFromCart(event, '2')"> Remove From Cart </button>
                    </div>
                    <div class="boxes">
                        <img src="/logo_css.png" alt="css3 iamge">
                        <h3>Product 3</h3>
                        <h4>Price: 60 AED</h4>
                        <button type="button" class="productPriceButton productPriceButtonAdd productPriceButtonAdd-3" data-id="3" onclick="addToCart(event, '60', '3')"> Add TO Cart </button>
                        <button type="button" class="productPriceButton productPriceButtonRemove productPriceButtonRemove-3 hidden" onclick="removeFromCart(event, '3')"> Remove From Cart </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="proceedToCheckout" class="hidden">
            <div class="container">
                <div class="checkoutTypesWrapper">
                    <button class="proceedToCheckout" onclick="showCheckoutType()"> Proceed to checkout </button>
                </div>
            </div>
        </section>

        <section id="checkoutTypes" class="hidden">
            <div class="container">
                <div class="checkoutTypesWrapper">
                    <button class="checkoutTypesButon" id="checkoutTypesButonGuest" onclick="openAsAGuestSection()"> First Time </button>
                    <button class="checkoutTypesButon checkoutTypesButonUser" id="checkoutTypesButonUser" onclick="openAsAUserSection()"> Use Save Card </button>


                </div>
            </div>
        </section> --}}

        <section id="checkoutTypeAsAGuest" class="">
            <div class="container">
                <div class="horizontalDiv">
                    <form class="sendEmailForm">
                        <h3>Customer Details</h3>
                        <div class="sendEmailFormWrapper">
                            <div>
                                <h4 class="nameHeading">First Name</h4>
                                <input type="text" placeholder="Please Enter First Name" class= "nameInput" id="customerFirstName">
                            </div>
                            <div>
                                <h4 class="nameHeading">Middle Name</h4>
                                <input type="text" placeholder="Please Enter Middle Name" class= "nameInput" id="customerMiddleName">
                            </div>
                            <div>
                                <h4 class="nameHeading">Last Name</h4>
                                <input type="text" placeholder="Please Enter Last Name" class= "nameInput" id="customerLastName">
                            </div>
                            <div>
                                <h4 class="emailHeading">Email</h4>
                                <input type="email" placeholder="Please Enter Email" class="emailInputForm2" id="customerEmail">
                            </div>
                            <div>
                                <h4 class="nameHeading">Country Code</h4>
                                <input type="number" pattern="[0-9]*" placeholder="Please Enter Country Code" class= "nameInput" id="customercountryCode">
                            </div>
                            <div>
                                <h4 class="nameHeading">Phone Number</h4>
                                <input  type="number" pattern="[0-9]*" placeholder="Please Enter Phone Number" class= "nameInput" id="customerPhoneNumber">
                            </div>



                            <p>Order Amount <span class="paidAmount" id="">100</span></p>
                            <p>Order Currency <span classs="paidAmount" id="">AED</span></p>



                            <div id="paymentSection" class="hidden">
                                <h4 class="nameHeading">Payment Options:</h4>
                                <br>
                                <label>
                                    <input type="radio" name="fruit" value="apple">
                                    Pay with Card
                                </label><br>

                                <label>
                                    <input type="radio" name="fruit" value="banana">
                Pay with Saved Card
            </label><br>

                                <label>
                                    <input type="radio" name="fruit" value="cherry">
                                    Pay with Apple Pay
                                </label><br>
                        </div>

                        </div>
                        <div id="ptoPayment">
                            <input  type ="button" value="Porceed to Paymeent" class="sendEmailButton" onclick="openPaymentOptions()">
                        </div>

                        <div class="hidden" id="completeOrder">
                            <input  type ="button" value="Complete Order" class="sendEmailButton" onclick="openPaymentOptions()">
                        </div>




                    </form>
                </div>
            </div>
        </section>

        <section id="checkoutTypeAsAUser" class="hidden">
            <div class="container">
                <div class="horizontalDiv">
                    <form class="sendEmailForm">
                        <h3>Enter your Email to get your Saved Cards</h3>
                        <div class="sendEmailFormWrapper">
                            <div>
                                <h4 class="emailHeading">Email</h4>
                                <input type="Email" placeholder="Please Enter Email" class="emailInputForm2" id="CardsEmail">
                            </div>

                        </div>
                        <div>
                            <input type ="button" value="Check my Saved Cards" class="sendEmailButton" onclick="getSaveCardCheckoutFormPay()">
                        </div>
                    </form>
                </div>
            </div>
        </section>



        <section id="savedCards" class="hidden">
            <div class="container">
                <div class="horizontalDiv">
                    <form method="POST" class="sendEmailForm" action="/payment/recurring/initiate">
                        @csrf
                        <h3>You will find your Saved Card below</h3>
                        <div class="sendEmailFormWrapper">
                            <div>
                                <h4 class="emailInputForm2" class="emailHeading">Saved Cards</h4>

                                <select class="emailInputForm2" name="card_id" id="allCards">

                                </select>


                                <input type="hidden" id="recurringAmount" name="amount"/>
                                <input type="hidden" value="recurring description" id="recurringDescription" name="description"/>
                                <input type="hidden" value="recurring" name="customerPaymentType"/>
                                <input type="hidden" id="recurringCustomerEmail" value="recurring" name="customerEmail"/>


                            </div>

                        </div>

                        <div id="hideComplete">
                            <input type ="submit" value="Complete Payment" class="sendEmailButton">
                        </div>


                        <div>
                            <input type ="button" value="Use a New Card" class="sendEmailButton" onclick="openAsAGuestSection()">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="cardTokenSection" class="hidden cardTokenSection">
            <div class="container">
                <div id="card-sdk-id"></div>
                <button id="card-v2" onclick="window.CardSDK.tokenize()" class="sendEmailButton">Submit</button>
            </div>
        </section>
        <form action="/payment/initiate" method="post" id="finalForm">
            @csrf
            <input type="hidden" id="formCardId" name="cardId"/>
            <input type="hidden" id="formIsSelected" name="formIsSelected"/>
            <input type="hidden" id="formID" name="id"/>
            <input type="hidden" id="formAmount" name="amount"/>
            <input type="hidden" id="formDescription" name="description"/>
            <input type="hidden" id="formCustomerFirstName" name="customer_first_name"/>
            <input type="hidden" id="formCustomerMiddleName" name="customer_middle_name"/>
            <input type="hidden" id="formCustomerLastName" name="customer_last_name"/>
            <input type="hidden" id="formCustomerEmail" name="customer_email"/>
            <input type="hidden" id="formCustomercountryCode" name="customer_country_code"/>
            <input type="hidden" id="formCustomerPhoneNumber" name="customer_phone_number"/>
            <input type="hidden" id="formPaymentType" name="customerPaymentType"/>
        </form>


    </body>



    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/paymentConfigurations.js"></script>

</html>
