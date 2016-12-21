<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="Orderdetails")
 */
class Orderdetails {

    /**
     * @ORM\ManyToOne(targetEntity="Orders", cascade={"persist"})
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity="Product", cascade={"persist"})
     */
    private $product;

    /**
     * @ORM\Column(type="decimal",scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\Column(type="decimal",scale=2)
     */
    private $shipping;

    /**
     * @ORM\Column(type="decimal",scale=2, nullable=true)
     */
    private $tax;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get Data
     *
     * @return array
     */
    public function getData() {
        return array($this->getOrder()->getId(), $this->getOrder()->getTransactionId(), $this->getOrder()->getUser()->getId(), $this->getOrder()->getIsdone(), $this->getOrder()->getOrderdate()->format("Y/m/d"), $this->getOrder()->getOrdertime()->format("H:i:s"), $this->getOrder()->getTypeLabel(), $this->getOrder()->getCountry(),
            $this->getOrder()->getShippingfirstname(), $this->getOrder()->getShippinglastname(), $this->getOrder()->getShippingaddress1(), $this->getOrder()->getShippingaddress2(), $this->getOrder()->getShippingcity(),
            $this->getOrder()->getShippingstate(), $this->getOrder()->getShippingzip(), $this->getOrder()->getBillingfirstname(), $this->getOrder()->getBillinglastname(), $this->getOrder()->getBillingaddress1(), $this->getOrder()->getBillingaddress2(),
            $this->getOrder()->getBillingcity(), $this->getOrder()->getBillingstate(), $this->getOrder()->getBillingzip(), $this->getOrder()->getPhone(), $this->getOrder()->getEmail(), $this->getOrder()->getOrdertotal(), $this->getOrder()->getShippingLabel(), $this->getOrder()->getShippingtotal(),
            $this->getOrder()->getTaxtotal(), // Tax Total
            $this->getOrder()->getOrdertotal(), // Order Total
            $this->getProduct()->getSku(), $this->getQty(), $this->getPrice(), $this->getShipping(), $this->getProduct()->getName());
    }

    /**
     *
     *
     * @return \UserBundle\Entity\Orders
     */
    public function getOrder() {

        return $this->order;
    }

    /**
     * Set orderId
     *
     * @param \UserBundle\Entity\Orders $order
     *
     * @return Orderdetails
     */
    public function setOrder($order) {
        $this->order = $order;

        return $this;
    }

    /**
     * Set productId
     *
     * @param \UserBundle\Entity\Product $product
     *
     * @return Orderdetails
     */
    public function setProduct($product) {
        $this->product = $product;

        return $this;
    }

    /**
     *
     *
     * @return \UserBundle\Entity\Product
     */
    public function getProduct() {

        return $this->product;
    }

    /**
     * Set price
     *
     * @param decimal $price
     *
     * @return Orderdetails
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return decimal
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     *
     * @return Orderdetails
     */
    public function setQty($qty) {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return integer
     */
    public function getQty() {
        return $this->qty;
    }

    /**
     * Set shipping
     *
     * @param decimal $shipping
     *
     * @return Orderdetails
     */
    public function setShipping($shipping) {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get shipping
     *
     * @return decimal
     */
    public function getShipping() {
        return $this->shipping;
    }

    /**
     * Set tax
     *
     * @param decimal $tax
     *
     * @return Orderdetails
     */
    public function setTax($tax) {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return decimal
     */
    public function getTax() {
        return $this->tax;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

}
