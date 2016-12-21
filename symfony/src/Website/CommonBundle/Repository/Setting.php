<?php

namespace Website\CommonBundle\Repository;

use Doctrine\ORM\EntityRepository;

class Setting extends EntityRepository {

    use BaseRepository;

    public $entity = 'Setting';

    public function findAllFilteredByCategory($category) {
        $this->getQb();

        if ($category) {
            $this->qb->where('obj.category = :category')->setParameter('category', $category);
        }

        return $this->getResult();
    }

    public function findAllYml() {
        $this->getQb();

        $this->qb->where('obj.yml = 1');

        return $this->getResult();
    }

}
