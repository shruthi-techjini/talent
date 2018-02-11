<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Constants\Constants;

/**
 * PostGenreMappingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserProfileRepository extends EntityRepository
{
	public function updateOldProfileImage($userId,$id)
	{
		$em = $this->getEntityManager();
		$query = $em->createQuery('UPDATE AppBundle:UserProfile a SET a.status = :toStatus
                      WHERE a.userId = :userId AND a.id != :id');
		$query->setParameters(array(
				'toStatus' => Constants::COMMENT_INACTIVE,
				'userId' => $userId,
				'id' => $id
		));
		try {
			$profilePic = $query->execute();
			return $profilePic;
		} catch (\Exception $e) {
			return $e->getMessage();
		}
	}
}