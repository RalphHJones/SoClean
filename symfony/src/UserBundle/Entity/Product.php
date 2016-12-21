<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="Product")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Product {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="decimal",scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMainOffer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isdiscount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isextra;

    /**
     * @ORM\Column(type="string")
     */
    private $sku;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set sku
     *
     * @param string $sku
     *
     * @return Product
     */
    public function setSku($sku) {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string
     */
    public function getSku() {
        return $this->sku;
    }

    /**
     * Set price
     *
     * @param decimal $price
     *
     * @return Product
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
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set isMainOffer
     *
     * @param boolean $isMainOffer
     *
     * @return Orders
     */
    public function setIsMainOffer($isMainOffer) {
        $this->isMainOffer = isMainOffer;

        return $this;
    }

    /**
     * Get isMainOffer
     *
     * @return boolean
     */
    public function getIsMainOffer() {
        return $this->isMainOffer;
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

    public function setIsextra($isExtra) {
        $this->isextra = $isExtra;
    }

    public function getIsextra() {
        return $this->isextra;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt) {
        $this->deletedAt = $deletedAt;
    }

}
