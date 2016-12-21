<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="Orders")
 */
class Orders {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders", cascade={"persist"})
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $taxstate;

    /**
     * @ORM\Column(type="date")
     */
    private $orderdate;

    /**
     * @ORM\Column(type="time")
     */
    private $ordertime;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $isdiscount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isdone = false;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $country;

    /**
     * @ORM\Column(type="decimal",scale=2)
     */
    private $shippingtotal;

    /**
     * @ORM\Column(type="string")
     */
    private $shippingfirstname;

    /**
     * @ORM\Column(type="string")
     */
    private $shippinglastname;

    /**
     * @ORM\Column(type="string")
     */
    private $shippingaddress1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $shippingaddress2 = null;

    /**
     * @ORM\Column(type="string")
     */
    private $shippingcity;

    /**
     * @ORM\Column(type="string")
     */
    private $shippingstate;

    /**
     * @ORM\Column(type="integer")
     */
    private $shippingzip;

    /**
     * @ORM\Column(type="string")
     */
    private $shippingmethod;

    /**
     * @ORM\Column(type="string")
     */
    private $billingfirstname;

    /**
     * @ORM\Column(type="string")
     */
    private $billinglastname;

    /**
     * @ORM\Column(type="string")
     */
    private $billingaddress1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $billingaddress2 = null;

    /**
     * @ORM\Column(type="string")
     */
    private $billingcity;

    /**
     * @ORM\Column(type="string")
     */
    private $billingstate;

    /**
     * @ORM\Column(type="string")
     */
    private $billingzip;

    /**
     * @ORM\Column(type="decimal",scale=2, nullable=true)
     */
    private $ordertotal = 0.00;

    /**
     * @ORM\Column(type="decimal",scale=2, nullable=true)
     */
    private $taxtotal = 0.00;

//    /**
//     * @ORM\Column(type="string", nullable=true)
//     */
//    private $tfn = null;
//
//    /**
//     * @ORM\Column(type="string", nullable=true)
//     */
//    private $ani = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $card_num;

    /**
     * @ORM\Column(type="string")
     */
    private $card_code;

    /**
     * @ORM\Column(type="string")
     */
    private $card_exp_date;

    /**
     * @ORM\Column(name="cpap", type="string", length=20, nullable=true)
     */
    private $cpap;

    /**
     * @ORM\Column(name="cpap_comment", type="string", length=100, nullable=true)
     */
    private $cpapComment;

    /**
     * @ORM\Column(name="transaction_id", type="string", nullable=true)
     */
    private $transactionId;

    /**
     * Set orderdate
     *
     * @param \Date $orderdate
     *
     * @return Orders
     */
    public function setOrderdate($orderdate) {
        $this->orderdate = $orderdate;

        return $this;
    }

    /**
     * Get orderdate
     *
     * @return \DateTime
     */
    public function getOrderdate() {
        return $this->orderdate;
    }

    /**
     * Set ordertime
     *
     * @param \DateTime $ordertime
     *
     * @return Orders
     */
    public function setOrdertime($ordertime) {
        $this->ordertime = $ordertime;

        return $this;
    }

    /**
     * Get ordertime
     *
     * @return \DateTime
     */
    public function getOrdertime() {
        return $this->ordertime;
    }

    /**
     * Set isdiscount
     *
     * @param boolean $isdiscount
     *
     * @return Orders
     */
    public function setIsdiscount($isdiscount) {
        $this->isdiscount = $isdiscount;

        return $this;
    }

    /**
     * Get isdiscount
     *
     * @return boolean
     */
    public function getIsdiscount() {
        return $this->isdiscount;
    }

    /**
     * Set isdone
     *
     * @param boolean $isdone
     *
     * @return Orders
     */
    public function setIsdone($isdone) {
        $this->isdone = $isdone;

        return $this;
    }

    /**
     * Get isdone
     *
     * @return boolean
     */
    public function getIsdone() {
        return $this->isdone;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Orders
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set shippingtotal
     *
     * @param decimal $shippingtotal
     *
     * @return Orders
     */
    public function setShippingtotal($shippingtotal) {
        $this->shippingtotal = $shippingtotal;

        return $this;
    }

    /**
     * Get shippingtotal
     *
     * @return decimal
     */
    public function getShippingtotal() {
        return $this->shippingtotal;
    }

    /**
     * Set shippingfirstname
     *
     * @param string $shippingfirstname
     *
     * @return Orders
     */
    public function setShippingfirstname($shippingfirstname) {
        $this->shippingfirstname = $shippingfirstname;

        return $this;
    }

    /**
     * Get shippingfirstname
     *
     * @return string
     */
    public function getShippingfirstname() {
        return $this->shippingfirstname;
    }

    /**
     * Set shippinglastname
     *
     * @param string $shippinglastname
     *
     * @return Orders
     */
    public function setShippinglastname($shippinglastname) {
        $this->shippinglastname = $shippinglastname;

        return $this;
    }

    /**
     * Get shippinglastname
     *
     * @return string
     */
    public function getShippinglastname() {
        return $this->shippinglastname;
    }

    /**
     * Set shippingaddress1
     *
     * @param string $shippingaddress1
     *
     * @return Orders
     */
    public function setShippingaddress1($shippingaddress1) {
        $this->shippingaddress1 = $shippingaddress1;

        return $this;
    }

    /**
     * Get shippingaddress1
     *
     * @return string
     */
    public function getShippingaddress1() {
        return $this->shippingaddress1;
    }

    /**
     * Set shippingaddress2
     *
     * @param string $shippingaddress2
     *
     * @return Orders
     */
    public function setShippingaddress2($shippingaddress2) {
        $this->shippingaddress2 = $shippingaddress2;

        return $this;
    }

    /**
     * Get shippingaddress2
     *
     * @return string
     */
    public function getShippingaddress2() {
        return $this->shippingaddress2;
    }

    /**
     * Set shippingcity
     *
     * @param string $shippingcity
     *
     * @return Orders
     */
    public function setShippingcity($shippingcity) {
        $this->shippingcity = $shippingcity;

        return $this;
    }

    /**
     * Get shippingcity
     *
     * @return string
     */
    public function getShippingcity() {
        return $this->shippingcity;
    }

    /**
     * Set shippingstate
     *
     * @param string $shippingstate
     *
     * @return Orders
     */
    public function setShippingstate($shippingstate) {
        $this->shippingstate = $shippingstate;

        return $this;
    }

    /**
     * Get shippingstate
     *
     * @return string
     */
    public function getShippingstate() {
        return $this->shippingstate;
    }

    /**
     * Set shippingzip
     *
     * @param integer $shippingzip
     *
     * @return Orders
     */
    public function setShippingzip($shippingzip) {
        $this->shippingzip = $shippingzip;

        return $this;
    }

    /**
     * Get shippingzip
     *
     * @return integer
     */
    public function getShippingzip() {
        return $this->shippingzip;
    }

    /**
     * Set shippingmethod
     *
     * @param string $shippingmethod
     *
     * @return Orders
     */
    public function setShippingmethod($shippingmethod) {
        $this->shippingmethod = $shippingmethod;

        return $this;
    }

    /**
     * Get shippingmethod
     *
     * @return string
     */
    public function getShippingmethod() {
        return $this->shippingmethod;
    }

    /**
     * Set billingfirstname
     *
     * @param string $billingfirstname
     *
     * @return Orders
     */
    public function setBillingfirstname($billingfirstname) {
        $this->billingfirstname = $billingfirstname;

        return $this;
    }

    /**
     * Get billingfirstname
     *
     * @return string
     */
    public function getBillingfirstname() {
        return $this->billingfirstname;
    }

    /**
     * Set billinglastname
     *
     * @param string $billinglastname
     *
     * @return Orders
     */
    public function setBillinglastname($billinglastname) {
        $this->billinglastname = $billinglastname;

        return $this;
    }

    /**
     * Get billinglastname
     *
     * @return string
     */
    public function getBillinglastname() {
        return $this->billinglastname;
    }

    /**
     * Set billingaddress1
     *
     * @param string $billingaddress1
     *
     * @return Orders
     */
    public function setBillingaddress1($billingaddress1) {
        $this->billingaddress1 = $billingaddress1;

        return $this;
    }

    /**
     * Get billingaddress1
     *
     * @return string
     */
    public function getBillingaddress1() {
        return $this->billingaddress1;
    }

    /**
     * Set billingaddress2
     *
     * @param string $billingaddress2
     *
     * @return Orders
     */
    public function setBillingaddress2($billingaddress2) {
        $this->billingaddress2 = $billingaddress2;

        return $this;
    }

    /**
     * Get billingaddress2
     *
     * @return string
     */
    public function getBillingaddress2() {
        return $this->billingaddress2;
    }

    /**
     * Set billingcity
     *
     * @param string $billingcity
     *
     * @return Orders
     */
    public function setBillingcity($billingcity) {
        $this->billingcity = $billingcity;

        return $this;
    }

    /**
     * Get billingcity
     *
     * @return string
     */
    public function getBillingcity() {
        return $this->billingcity;
    }

    /**
     * Set billingstate
     *
     * @param string $billingstate
     *
     * @return Orders
     */
    public function setBillingstate($billingstate) {
        $this->billingstate = $billingstate;

        return $this;
    }

    /**
     * Get billingstate
     *
     * @return string
     */
    public function getBillingstate() {
        return $this->billingstate;
    }

    /**
     * Set billingzip
     *
     * @param integer $billingzip
     *
     * @return Orders
     */
    public function setBillingzip($billingzip) {
        $this->billingzip = $billingzip;

        return $this;
    }

    /**
     * Get billingzip
     *
     * @return integer
     */
    public function getBillingzip() {
        return $this->billingzip;
    }

    /**
     * Set ordertotal
     *
     * @param decimal $ordertotal
     *
     * @return Orders
     */
    public function setOrdertotal($ordertotal) {
        $this->ordertotal = $ordertotal;

        return $this;
    }

    /**
     * Get ordertotal
     *
     * @return decimal
     */
    public function getOrdertotal() {
        return $this->ordertotal;
    }

    /**
     * Set taxtotal
     *
     * @param decimal $taxtotal
     *
     * @return Orders
     */
    public function setTaxtotal($taxtotal) {
        $this->taxtotal = $taxtotal;

        return $this;
    }

    /**
     * Get taxtotal
     *
     * @return decimal
     */
    public function getTaxtotal() {
        return $this->taxtotal;
    }

//    /**
//     * Set tfn
//     *
//     * @param integer $tfn
//     *
//     * @return Orders
//     */
//    public function setTfn($tfn) {
//        $this->tfn = $tfn;
//
//        return $this;
//    }
//
//    /**
//     * Get tfn
//     *
//     * @return integer
//     */
//    public function getTfn() {
//        return $this->tfn;
//    }

    /**
     * Set ani
     *
     * @param integer $ani
     *
     * @return Orders
     */
    public function setAni($ani) {
        $this->ani = $ani;

        return $this;
    }

    /**
     * Get ani
     *
     * @return integer
     */
    public function getAni() {
        return $this->ani;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Orders
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Orders
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->userid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Orders
     */
    public function setUser(\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Set type

     * @return Orders
     */
    public function setType($type = null) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set card_num
     *
     * @param string $card_num
     *
     * @return Orders
     */
    public function setcard_num($card_num) {
        $this->card_num = $card_num;

        return $this;
    }

    /**
     * Get card_number
     *
     * @return string
     */
    public function getcard_num() {
        return $this->card_num;
    }

    /**
     * Set card_code
     *
     * @param string $card_code
     *
     * @return Orders
     */
    public function setcard_code($card_code) {
        $this->card_code = $card_code;

        return $this;
    }

    /**
     * Get card_exp_date
     *
     * @return string
     */
    public function getcard_exp_date() {
        return $this->card_exp_date;
    }

    /**
     * Set card_exp_date
     *
     * @param string $card_exp_date
     *
     * @return Orders
     */
    public function setcard_exp_date($card_exp_date) {
        $this->card_exp_date = $card_exp_date;

        return $this;
    }

    /**
     * Get card_code
     *
     * @return string
     */
    public function getcard_code() {
        return $this->card_code;
    }

    public function setCpap($cpap) {
        $this->cpap = $cpap;
    }

    public function getCpap() {
        return $this->cpap;
    }

    public function setCpapComment($cpapComment) {
        $this->cpapComment = $cpapComment;
    }

    public function getCpapComment() {
        return $this->cpapComment;
    }

    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }

    public function getTransactionId() {
        return $this->transactionId;
    }

    public function getTaxstate() {
        return $this->taxstate;
    }

    public function setTaxState($taxstate) {
        $this->taxstate = $taxstate;
    }

    public function getPayAmount($first_payment_3pay) {
        $payAmountRemaining = 0;

        $payAmount = $this->getOrdertotal();

        if ($this->getType() === '3Pay') {
            $firstCharge = $first_payment_3pay + $this->getTaxtotal() + $this->getShippingtotal();
            $remaining = $payAmount - $firstCharge;


            if ($remaining > 0) {
                $payAmountRemaining = round($remaining / 2, 2, PHP_ROUND_HALF_DOWN);
            }

            // make sure we are not overcharging the client
            if ($this->getOrdertotal() < $first_payment_3pay) {
                $payAmount = $this->getOrdertotal();
            } else {
                $payAmount = $firstCharge;
            }
        }

        return [$this->format($payAmount), $this->format($payAmountRemaining)];
    }

    public function getTypeLabel() {
        return $this->getType() === '1Pay' ? 'One-Time Payment' : ' 3 Month Subscription';
    }

    public function getShippingLabel() {
        return $this->getShippingmethod() === '1Pay' ? 'Free Shipping' : ($this->getShippingmethod() === '3Pay' ? '3Pay Shipping' : "Rush Shipping");
    }

    function format($amount) {
        return number_format((float) $amount, 2, '.', '');
    }

}
