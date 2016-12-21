<?php
// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Orders", mappedBy="user")
     */
    protected $orders;
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getOrders()
    {
        return $this->orders;
    }
    public function getRecentorder(){
        $recent=null;
        foreach($this->getOrders() as $order){
            $recent = $order;
            /*if($recent=="" or $recent<$order->orderdate->format("Y-m-d")){
                $recent = $order->orderdate->format("Y-m-d");
            }*/
        }
        return $recent;
    }
}
