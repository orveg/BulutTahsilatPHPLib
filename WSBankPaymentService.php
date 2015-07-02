<?php
/**
 * @Description Bulut Tahsilat API v1.1 PHP Entegrasyonu
 * @Author Orhan V. Gülenay orveg@hotmail.com
 *
 */
const url = "http://portal.buluttahsilat.com/WebService/WSBankPaymentService.asmx?wsdl";

const userName = "*****";
const password = "*****";
const firmAPICode = "******";
const FirmCode = "*****";

const BankPaymentList = "BankPaymentList";
const UpdatePayment = "UpdatePaymentStatusInfo";
const SubFirmList = "SubFirmList";
const SubFirmAddNew = "SubFirmAddNew";

class WSBankPaymentService
{

    public $client = "";
    public $args   = array();

    public $username    = "";
    public $password    = "";
    public $firmAPICode = "";

    public function __construct($username = userName, $password = password, $firmAPICode = firmAPICode)
    {
        $this->client = new SoapClient(url, array('trace' => TRUE,
            'exceptions' => TRUE,));
        $this->username = $username;
        $this->password = $password;
        $this->firmAPICode = $firmAPICode;
    }

    /**
     * @param string $func
     *
     * @return array
     */
    public function setApiUser($func)
    {

        /**
         * Fonksiyonlardaki tutarsızlıktan böyle yapıldı
         */
        if($func == "BankPaymentList") {
            $result = $this->args[$func] = array('userName' => $this->username,
                'password' => $this->password,
                'firmCode' => $this->firmAPICode);
        }
        else {
            $result = $this->args[$func] = array('userName' => $this->username,
                'password' => $this->password,
                'firmAPICode' => $this->firmAPICode);
        }

        return $result;

    }

    /**
     * @param array $params
     *
     * @return json_data
     */
    public function BankPaymentList($params = array())
    {

        $user = $this->setApiUser(BankPaymentList);

        $this->args[BankPaymentList] = array_merge($user, $params);

        $result = $this->client->__call(BankPaymentList, $this->args);
        echo json_encode($result);
    }

    /**
     * @param array $params
     *
     * @return json_data
     */
    public function UpdatePayment($params = array())
    {
        $user = $this->setApiUser(UpdatePayment);
        $this->args[UpdatePayment] = array_merge($user, $params);
        $result = $this->client->__call(UpdatePayment, $this->args);
        echo json_encode($result);
    }

    /**
     * @return json_data
     */
    public function SubFirmList()
    {

        $this->args[SubFirmList] = $this->setApiUser(SubFirmList);
        $result = $this->client->__call(SubFirmList, $this->args);
        echo json_encode($result);

    }

    /**
     * @param array $params
     *
     * @return json_data
     */
    public function SubFirmAddNew($params = array())
    {

        $user = $this->setApiUser(SubFirmAddNew);
        $this->args[SubFirmAddNew] = array_merge($user, $params);
        $result = $this->client->__call(SubFirmAddNew, $this->args);
        echo json_encode($result);

    }

}