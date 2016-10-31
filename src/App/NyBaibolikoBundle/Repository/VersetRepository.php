<?php

namespace App\NyBaibolikoBundle\Repository;

/**
 * VersetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VersetRepository extends \Doctrine\ORM\EntityRepository
{
    public function findVerset($book, $chapNumber, $versetFirst, $versetLast) {
        $query = $this->createQueryBuilder('verset');
        if($versetLast - $versetFirst == 0) {
            $query->where('verset.book = :book')->setParameter('book', $book)
                ->andWhere('verset.chapitreNumber = :chapNumber')->setParameter('chapNumber', $chapNumber)
                ->andWhere('verset.versetNumber = :versetNumber')->setParameter('versetNumber',$versetFirst);
        } else {
            $query->where('verset.book = :book')->setParameter('book', $book)
                ->andWhere('verset.chapitreNumber = :chapNumber')->setParameter('chapNumber', $chapNumber)
                ->andWhere($query->expr()->between('verset.versetNumber',':first',':last'))
                ->setParameter('first',$versetFirst)
                ->setParameter('last',$versetLast);
        }
        return $query->getQuery()->execute();
    }
}
