<?php
 namespace AppBundle\Constants;
 
 class MailTemplates{
 	
 	public static function registerEmial($options = array()){
 		
 		$template  = "<p> Hi ".$options['firstName']." ".$options['lastName']."</p>";
 		$template .= "<p> Welcome to the I do have Talent. Thank you for creating the acount. To verify you email, please click the below link </p>";
 		$template .= "<a href=".$options['url'].">".$options['url']."</a>";
 		$template .= "<p> Thank you </p> ";
 		$template .= "I do have Talent"; 
 		
 		return $template; 
 	}
 	
 }
 