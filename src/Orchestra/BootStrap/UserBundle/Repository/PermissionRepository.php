<?php
/**
 * This file is part of the <User> project.
 *
 * @category   BootStrap_Repositories
 * @package    Repository
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 * @since 2012-01-02
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace BootStrap\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Permission Repository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 * @category   BootStrap_Repositories
 * @package    Repository
 *
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 */
class PermissionRepository extends EntityRepository
{
	const PERMISSION_DEFAULT 		= 'VIEW';

	/**
	 * Return the default role value
	 *
	 * @return string
	 * @static

	 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
	 * @since 2011-12-28
	 */
	public static function ShowDefaultPermission()
	{
		return self::PERMISSION_DEFAULT;
	}

	/**
	 * Return the default permissions available
	 *
	 * @return Doctrine\ORM\Query
	 * 
	 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
	 * @since 2012-01-04
	 */
	public function getAvailablePermissions()
	{
		$query = $this->createQueryBuilder('p')
		->select('p.name')
		->where('p.enabled = :enabled')
		->setParameter('enabled', 1);
		
		return $query->getQuery()->getResult();		
	}	
}