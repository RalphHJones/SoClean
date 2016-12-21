<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * subscription
 *
 * @ORM\Table(name="subscription")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\subscriptionRepository")
 */
class subscription
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
     * @ORM\Column(name="first", type="decimal", precision=10, scale=2)
     */
    private $first;

    /**
     * @var string
     *
     * @ORM\Column(name="second", type="decimal", precision=10, scale=2)
     */
    private $second;


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
     * Set first
     *
     * @param string $first
     *
     * @return subscription
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get first
     *
     * @return string
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set second
     *
     * @param string $second
     *
     * @return subscription
     */
    public function setSecond($second)
    {
        $this->second = $second;

        return $this;
    }

    /**
     * Get second
     *
     * @return string
     */
    public function getSecond()
    {
        return $this->second;
    }
}

