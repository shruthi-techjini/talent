<?php

namespace AppBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
	Const STATUS_ACTIVE = 1;
	Const STATUS_INACTIVE = 2;
	
	public static $statusArray = array(
		self::STATUS_ACTIVE => 'Active',
		self::STATUS_INACTIVE => 'Inactive',
	);
}
