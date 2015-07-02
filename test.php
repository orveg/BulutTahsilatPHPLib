<?php
require_once __DIR__ . "WSBankPaymentService.php";

$wsdl = new WSBankPaymentService();


if($_GET['type'] = 'BankPaymentList') {
    $paramsBankPaymentList = array('paymentStatusTypeID' => 534,
        'startDate' => '2015-06-24T00:00:00',
        'endDate' => '2015-06-25T23:59:59');

    $wsdl->BankPaymentList($paramsBankPaymentList);
}
elseif($_GET['type'] = 'UpdatePayment') {
    $paramsUpdatePayment = array('PaymentID' => 534,
        'paymentStatusTypeID' => 531);
    $wsdl->UpdatePayment($paramsUpdatePayment);
}
elseif($_GET['type'] = 'SubFirmList') {
    $wsdl->SubFirmList();
}

elseif($_GET['type'] = 'SubFirmAddNew') {
    $paramsSubFirmAddNew = array('FirmName' => 'FirmaAdı',
        'Adress' => 'Adress',
        'County' => 'County',
        'CityID' => 34,
        'Phone' => 'Phone',
        'TaxOffice' => 'TaxOffice',
        'TaxNumber' => 'TaxNumber',
        'AuthPersName' => 'AuthPersName',
        'AuthPersSurname' => 'AuthPersSurname',
        'AuthPersGSM' => 'AuthPersGSM',
        'AuthPersGenderID' => 31);

    $wsdl->SubFirmAddNew($paramsSubFirmAddNew);
}