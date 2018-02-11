<?php
namespace AppBundle\Constants;

class Constants{
	
	Const USER_STATUS_PENDING = 1;
	Const USER_STATUS_VERIFIED = 2;
	
	Const USER_TYPE_USER = 1;
	Const USER_TYPE_TALENT = 2;
	Const USER_TYPE_ADMIN = 3;
	
	Const POST_STATUS_PENDING = 1;
	Const POST_STATUS_ACTIVE = 2;
	Const POST_STATUS_INACTIVE = 3;
	Const POST_STATUS_DELETED = 4;
	
	Const COMMENT_ACTIVE = 1;
	Const COMMENT_INACTIVE = 2;
	Const COMMENT_DELETE = 3;
	
	public static $statusArray = array(
		self::COMMENT_ACTIVE => 'Active',
		self::COMMENT_INACTIVE => 'Inactive',
		self::COMMENT_DELETE => 'Delete'
	);
}