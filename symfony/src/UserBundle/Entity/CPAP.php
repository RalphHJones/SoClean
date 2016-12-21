<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CPAP
 *
 * @ORM\Entity
 * @ORM\Table(name="CPAP")
 */
class CPAP
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="CPAP", type="string", length=30, unique=true)
     */
    private $cPAP;

    /**
     * @var string
     *
     * @ORM\Column(name="Adapter", type="string", length=20, nullable=true)
     */
    private $adapter;

    /**
     * @var int
     *
     * @ORM\Column(name="Category_id", type="integer", nullable=true)
     */
    private $categoryId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cPAP
     *
     * @param string $cPAP
     *
     * @return CPAP
     */
    public function setCPAP($cPAP)
    {
        $this->cPAP = $cPAP;

        return $this;
    }

    /**
     * Get cPAP
     *
     * @return string
     */
    public function getCPAP()
    {
        return $this->cPAP;
    }

    /**
     * Set adapter
     *
     * @param string $adapter
     *
     * @return CPAP
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;

        return $this;
    }

    /**
     * Get adapter
     *
     * @return string
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return CPAP
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}

