<?php

require_once 'Banktopup.php';


$btup = new Banktopup("ใส่ license");

$btup->setDeviceid("ใส่ device id");
$btup->setPin("ใส่ pin");
$btup->setAccountNo("ใส่เลขบัญชี");


//เช็คเงินในบช
$s = $btup->Summary();
if ($s['error']['code'] != 100){
    var_dump($s['error']);
    exit();
}
var_dump($s);

//เช็ครายการ
$t = $btup->Transactions(7,1,20);
if ($t['error']['code'] != 100){
    var_dump($t['error']);
    exit();
}
var_dump($t);

//ตรวจสอบยอดก่อนโอน
$v = $btup->Verification("เลขบชที่จะโอนไปให้","เลขธนาคารดูใน doc");
var_dump($v);


//โอนเงิน
$to = $btup->Transfer("เลขบชที่จะโอนไปให้","เลขธนาคารดูใน doc");
var_dump($to);

//เช็ค device id ยังใช้ได้อยู่มั้ย
$check = $btup->CheckDevice("deviceid เช็คว่ายังใช้ได้มั้ย");
var_dump($check);


//ดึงข้อมูลธนาคาร
$elig = $btup->Eligiblebanks();
var_dump($elig);

//ลงทะเบียนเครื่องใหม่
$btup->Register(...);
$btup->ConfirmOTP(...);
