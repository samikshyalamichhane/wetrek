<?php

return [
	"merchantId" => "9103332177", // Merchant ID provided by Himalayan Bank
"secretKey" => "d64fcd5489eb42bebe46c5fcd0cf19be", // Secrect Key associated with the Merchant ID

// "currencyCode" => "USD", // Currency type: USD, NPR
"nonSecure" => "Y", // Option for OTP authentication Y/N, Y means disable authentication

"methodUrl" => "https://uat3ds.2c2p.com/HBLPGW/Payment/Payment/Payment", // Only update URL if needed
"clickContinue" => false, // Click to continue for Payment Page redirection true/false
"redirectWait" => 1500, // Redirect wait time in miliseconds, set 0 for no wait time
];
