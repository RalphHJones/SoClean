<?php

namespace Website\CommonBundle\Repository;

trait BaseRepository {

    public $qb;

    public function findOneBySlug($slug, $locale = '') {
        $this->getQb();

        $this->qb->where('obj.slug = :slug')->setParameter('slug', $slug);

        $this->locale = $locale;

        return $this->getSingleResult();
    }

    public function findOneEntityByKey($key, $locale = null) {
        $this->getQb();

        $this->locale = $locale;

        $this->qb->where('obj.key = :key')->setParameter('key', $key);

        return $this->getSingleResult();
    }

    public function getResult() {
        $this->query = $this->qb->getQuery();


        return $this->query->getResult();
    }

    public function getSingleResult() {
        $this->qb->setMaxResults(1);
        $this->query = $this->qb->getQuery();

        try {
            $result = $this->query->getSingleResult();
        } catch (\Doctrine\Orm\NoResultException $e) {

            $result = null;
        }

        return $result;
    }

    public function findOneById($id, $locale = null) {
        $this->getQb();

        $this->qb->where('obj.id = :id')->setParameter('id', $id);

        $this->locale = $locale;

        return $this->getSingleResult();
    }

    public function findAllPublished($locale = '') {
        $this->getQb();

        if ($locale) {
            $this->locale = $locale;
        }

        return $this->getResult();
    }

    public function findAll($locale = '', $limit = '') {
        $this->getQb();

        $this->locale = $locale;

        if ($limit) {
            $this->qb->setMaxResults($limit);
        }

        $this->qb->orderBy('obj.id', 'DESC');
        return $this->getResult();
    }

    public function countAll() {
        $query = $this->getEntityManager()->createQuery("SELECT COUNT(obj.id) FROM WebsiteCommonBundle:$this->entity obj ");

        try {
            $result = $query->getSingleScalarResult('count-all');
        } catch (\Doctrine\Orm\NoResultException $e) {
            $result = 0;
        }

        return $result;
    }

    public function addSearchFilter($search) {
        $this->qb->andWhere($this->qb->expr()->orX(
                        $this->qb->expr()->andX(
                                $this->qb->expr()->like('obj.title', ':search')
                        ), $this->qb->expr()->andX(
                                $this->qb->expr()->like('obj.content', ':search')
                        )
                )
        )->setParameter('search', '%' . $search . '%');
    }

    public function getQb() {
        $repository = $this->getEntityManager()->getRepository('WebsiteCommonBundle:' . $this->entity);
        $this->qb = $repository->createQueryBuilder('obj');
    }

}
