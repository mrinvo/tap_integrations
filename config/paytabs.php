<?php

return [

    'UAE' =>  	[
        'hosted' => 'https://secure.paytabs.com/payment/request',
        'invoice' => 'https://secure.paytabs.com/payment/new/invoice'
    ],

    'KSA' =>  	[
        'hosted' => 'https://secure.paytabs.sa/payment/request',
        'invoice' => 'https://secure.paytabs.sa/payment/new/invoice'
    ],

    'Egypt' =>  	[
        'hosted' => 'https://secure-egypt.paytabs.com/payment/request',
        'recurring' => 'https://secure-egypt.paytabs.com/payment/request',

        'invoice' => 'https://secure-egypt.paytabs.com/payment/new/invoice',
        'managed' => 'https://secure-egypt.paytabs.com/payment/request',
        'own' => 'https://secure-egypt.paytabs.com/payment/request',
        'capture' => 'https://secure-egypt.paytabs.com/payment/request',
        'void' => 'https://secure-egypt.paytabs.com/payment/request',
        'refund' => 'https://secure-egypt.paytabs.com/payment/request',
        'status' => 'https://secure-egypt.paytabs.com/payment/invoice/status',
        'cancel' => 'https://secure-egypt.paytabs.com/payment/invoice/cancel',

        'query' => 'https://secure-egypt.paytabs.com/payment/query',
    ],

    'Oman'	=>  	[
        'hosted' => 'https://secure-oman.paytabs.com/payment/request',
        'invoice' => 'https://secure-oman.paytabs.com/payment/new/invoice'
    ],

    'Jordan' =>  	[
        'hosted' => 'https://secure-egypt.paytabs.com/payment/request',
        'invoice' => 'https://secure-egypt.paytabs.com/payment/new/invoice'
    ],

    'Global'  =>  	[
        'hosted' => 'https://secure-global.paytabs.com/payment/request',
        'invoice' => 'https://secure-global.paytabs.com/payment/new/invoice'
    ],




    'tran_type' => 'sale',
    'tran_class' => 'ecom',
];

?>
