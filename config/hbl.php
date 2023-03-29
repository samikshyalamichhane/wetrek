<?php

return  [
    'hbl' => [
        'merchant_id' => env('HBL_MERCHANT_ID'),
        'api_key' => env('HBL_API_KEY'),
        'input_currency' => 'NPR',
        'input_3d' => 'N'
    ],
	'customer_app_url' => env('CUSTOMER_APP_URL', 'https://wetreknepal.com/'),
	'captcha'=>[
		'site_key' => env('RECAPTCHA_SITE_KEY'),
		'secret_key' => env('RECAPTCHA_SECRET_KEY'),
	]
];
