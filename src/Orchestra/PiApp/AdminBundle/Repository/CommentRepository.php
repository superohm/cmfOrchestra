<?php
/**
 * This file is part of the <Admin> project.
 *
 * @category   Admin_Repositories
 * @package    Repository
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 * @since 2011-12-28
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BootStrap\TranslationBundle\Repository\TranslationRepository;

/**
 * Comment Repository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 * 
 * @category   Admin_Repositories
 * @package    Repository
 * 
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 */
class CommentRepository extends TranslationRepository
{
	/**
	 * Return all Comment of a translation Page.
	 *
	 * @return array\PiApp\AdminBundle\Entity\Comment
	 * @access public
	 *
	 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
	 * @since 2012-01-23
	 */	
	public function getCommentsByPage($pageTransID, $approved = true)
	{
		$qb = $this->createQueryBuilder('c')
		->select('c')
		->where('c.pageTranslation = :pageTrans')
		->addOrderBy('c.created_at')
		->setParameter('pageTrans', $pageTransID);
	
		if (false === is_null($approved))
			$qb->andWhere('c.approved = :approved')
			->setParameter('approved', $approved);
	
		return $qb->getQuery()
		->getResult();
	}
	
	/**
	 * Return latest comments.
	 *
	 * @return array\PiApp\AdminBundle\Entity\Comment
	 * @access public
	 *
	 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
	 * @since 2012-01-23
	 */	
	public function getLatestComments($limit = 10)
	{
		$qb = $this->createQueryBuilder('c')
		->select('c')
		->addOrderBy('c.id', 'DESC');
	
		if (false === is_null($limit))
			$qb->setMaxResults($limit);
	
		return $qb->getQuery()
		->getResult();
	}	
}