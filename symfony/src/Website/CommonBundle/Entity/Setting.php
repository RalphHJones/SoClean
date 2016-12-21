<?php

namespace Website\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Website\SharedBundle\Entity\Settings
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity(repositoryClass="Website\CommonBundle\Repository\Setting")
 */
class Setting {

    use BaseTrait;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string attribute
     *
     * @ORM\Column(name="key_id",  type="string", length=255, unique=true)
     */
    private $key;

    /**
     * @var string $value
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var string $description
     * 
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string $type
     * 
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string $type
     * 
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @var boolean
     *
     * @ORM\Column(name="yml", type="boolean", nullable=true)
     */
    private $yml;

    public function setValue($value) {
        if ($this->getType() == 'boolean') {
            $value = intval($value);
        }

        $this->value = $value;
    }

    public function getValue() {
        if ($this->getType() == 'boolean') {
            return (bool) $this->value;
        }
        
        if ($this->getType() == 'float') {
            return floatval($this->value);
        }

        return $this->value;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

}
