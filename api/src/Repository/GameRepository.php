<?php

namespace App\Repository;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    /**
    * @return Game[] Returns an array of Game objects
    */
    public function search(array $filters)
    {
        $queryBuilder = $this->createQueryBuilder('g');
        foreach ($filters as $key => $filter)
        {
            if (is_array($filter)) {
                $queryBuilder->join('g'.$key, $key);
                foreach ($filter as $param)
                {
                    $varname = substr($param,0,3);
                    $queryBuilder
                        ->orWhere("$key.name = :$varname")
                        ->setParameter($varname, $param);
                }
            } 
            else { 
                // $separator = ($key == 'name')? ' LIKE ':' = ';
                    // $queryBuilder 
                    //     ->andWhere("$key.$key $separator $key")
                    //     ->setParameter($key, $filter);
            }
        }
        // $separator = ($key == 'name')? ' LIKE ':' = ';
        // dd($key);
        $queryBuilder
            ->andWhere("$key".".$key LIKE :$key")
            ->setParameter($key, $filter)       
            ->orderBy('g.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function save(Game $game)
    {
        $em = $this->getRepository(Game::class);
        if(!$em->find($game->getId())) {
            $em->persist($game);
            $em->flush();
        }
    }
    
    
    // /**
    //  * @return Game[] Returns an array of Game objects
    //  */
    /*
    public function findByExampleField($value)
     * @return Game[] Returns an array of Game objects
     */
    public function findGameByName($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('LOWER(g.name) LIKE LOWER(:name)')
            ->setParameter('name', $value)
            ->getQuery()
            ->getResult();
    }

    public function findGamePopular()
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.aggregated_rating >= 70')
            ->andWhere('g.aggregated_rating_count >= 20')
            ->addOrderBy('g.aggregated_rating')
            ->addOrderBy('g.aggregated_rating_count')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
    }

    public function findFilteredGames(Game $game)
    {
        $query = $this->createQueryBuilder('g')
            ->select('g');

            if(!empty($game->getName())){

                $query = $query->andWhere('g.name LIKE :name')
                        ->setParameter('name',"%{$game->getName()}%");
            }
            // dd($game->getGenres()->findAll();
            if(!$game->getGenres()->isEmpty()){

                $query =  $query->Join('g.genres', 'ge')->andWhere('ge.id IN (:genres)')
                        ->setParameter('genres',$game->getGenres());
            }

            if(!$game->getInvolvedCompanies()->isEmpty()){
                $query = $query ->Join('g.involved_companies', 'ic' )->andWhere('ic.id IN (:companies)')
                        ->setParameter('companies',$game->getInvolvedCompanies());
            }

            if(!$game->getPlatforms()->isEmpty()){
                $query = $query->Join('g.platforms', 'p')->andWhere('p.id IN (:platforms)')
                        ->setParameter('platforms',$game->getPlatforms());
            }

            if(!$game->getModes()->isEmpty()){
                $query = $query->Join('g.modes', 'm')->andWhere('m.id IN (:modes)')
                        ->setParameter('modes',$game->getModes());
            }
            
            return $query->setMaxResults(20)
            ->getQuery()
            ->getResult();
    }

    public function fingGameGenres(Game $game)
    {
        $query = $this->createQueryBuilder('g')
            ->select('g');

            if(!empty($game->getName())){

                $query = $query->andWhere('g.name LIKE :name')
                        ->setParameter('name',"%{$game->getName()}%");
            }
            // dd($game->getGenres()->findAll();
            if(!$game->getGenres()->isEmpty()){

                $query =  $query->Join('g.genres', 'ge')->andWhere('ge.id IN (:genres)')
                        ->setParameter('genres',$game->getGenres());
            }

            if(!$game->getInvolvedCompanies()->isEmpty()){
                $query = $query ->Join('g.involved_companies', 'ic' )->andWhere('ic.id IN (:companies)')
                        ->setParameter('companies',$game->getInvolvedCompanies());
            }

            if(!$game->getPlatforms()->isEmpty()){
                $query = $query->Join('g.platforms', 'p')->andWhere('p.id IN (:platforms)')
                        ->setParameter('platforms',$game->getPlatforms());
            }

            if(!$game->getModes()->isEmpty()){
                $query = $query->Join('g.modes', 'm')->andWhere('m.id IN (:modes)')
                        ->setParameter('modes',$game->getModes());
            }
            
            return $query->setMaxResults(20)
            ->getQuery()
            ->getResult();
    }

    public function findAllNames()
    {
        $gamesNames = $this->createQueryBuilder('game')
            ->select('game.name')
            ->getQuery()
            ->getResult()
        ;

        return array_map(function($game){ 
            return $game['name'];
        }, $gamesNames);
    }
}
