<?php
// Set sandbox (test mode) to true/false.
$sandbox = TRUE;

$config = array(
    'paypal' => array(
        'api_version'   => '85.0',
        'api_endpoint'  => $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp',
        'api_username'  => $sandbox ? 'test3243_api1.test.com' : 'LIVE_USERNAME_GOES_HERE',
        'api_password'  => $sandbox ? '5VV8Q72KRC83Q789' : 'LIVE_PASSWORD_GOES_HERE',
        'api_signature' => $sandbox ? 'AiPC9BjkCyDFQXbSkoZcgqH3hpacA9jsTG88SBLYTrHUvC4RLaQNpC77' : 'LIVE_SIGNATURE_GOES_HERE',
    )
);