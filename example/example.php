<?php 
    require_once('Banktopup.php');

    $btup = new Banktopup('license');
    $btup->setDeviceid('device_id');
    $btup->setPin('pin');
    $btup->setAccountNo('account_number');

    // summary
    $summary = $btup->Summary();
    echo $summary['result']['data']['totalAvailableBalance'];

    // transactions
    $transactions = $btup->Transactions(7 /*prvious day*/, 1 /*page number*/, 50 /*limit*/);
    var_dump($transactions);

    // transfer
    $transfer = $btup->Transfer('' /*accout number*/, '' /*bank code*/, 0 /*amount*/);
    var_dump($transfer);

    // register
    $register = $btup->Register([
        'identification' => '',
        'year' => '',
        'month' => '',
        'day' => '',
        'pin' => '',
        'mobile_phone_no' => '',
        'account_no' => '',
        'device_brand' => '',
        'device_code' => ''
    ]);
    $deviceID = $register['result']['deviceid'];
    
    $btup->ConfirmOTP($deviceID, 'OTP');
?>