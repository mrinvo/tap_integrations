# Laravel Payment Integration with Tap Payments

This project is a payment integration with Tap Payments, focusing on utilizing the Tap Payments API and implementing SOLID principles. A minimal UI has been used to enhance user experience without unnecessary complexity.

## Features

- **Accepting Card Details**: Accepts card details via the Card SDK v2.
- **Tokenizing Card Details**: 
  - Tokenizes the card details and saves them if they are VISA cards.
  - MASTERCARD cards are rejected.
- **Displaying Saved Cards**: Displays saved cards with the first 6 and last 4 digits, along with the card logo.
- **Multiple Card Storage**: Allows users to save multiple cards.
- **Processing Payments**: Enables users to select a saved card and process payments without generating a 3D Secure link.

## Project Structure

### Configuration

- **`public/js/paymentConfigurations.js`**  
  This file contains the configurations for the Card SDK v2 to accept card details.

### Controllers

- **`app/Http/Controllers/PaymentController.php`**  
  This controller handles payment-related actions within the application, such as initiating payment requests and processing responses.

### Repositories

- **`app/Repositories/PaymentRepository.php`**  
  This repository provides methods for processing payment-related data and interactions with the payment gateway.

### Resources

- **`app/Http/Resources/DataWrapper.php`**  
  This resource serves as a wrapper for preparing the payment request payload.

### Traits

- **`app/Traits/SendRequestTrait.php`**  
  This trait provides methods for sending payment requests through the specified endpoint, payload, and HTTP method.

### Configuration Endpoints

- **`config/PaymentEndpoints.php`**  
  This class contains a list of all the necessary endpoints used across the project.

### Tap Environment Configurations

- The following environment variables should be defined in your `.env` file:

  ```env
  TAP_PUBLIC_KEY=
  TAP_SECRET_KEY=
  TAP_MERCHANT_ID=
  TAP_URN="https://api.tap.company/v2"
  STORE_CURRENCY="AED"

## Installation


Follow the normal installation process for any laravel project:





