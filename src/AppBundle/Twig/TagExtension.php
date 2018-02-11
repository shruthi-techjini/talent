<?php
namespace AppBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Constants\Constants;

class TagExtension extends \Twig_Extension{
	
	private $container;
	
	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
	
	public function getFilters()
	{
		$filters = array(
				new \Twig_SimpleFilter('language', array($this, 'languageFilter')),
				new \Twig_SimpleFilter('subcategory', array($this, 'subcategoryFilter')),
				new \Twig_SimpleFilter('genre', array($this, 'genreFilter')),
				new \Twig_SimpleFilter('userImage', array($this, 'userImageFilter')),
				new \Twig_SimpleFilter('userName', array($this, 'userNameFilter')),
				
		);
	
		return $filters;
	}
	
	public function getContainer()
	{
		return $this->container;
	}
	
	public function languageFilter($id)
	{
		$language = $this->getContainer()->get('doctrine')->getRepository('AppBundle:Languages')->findOneById($id);
		return $language->getName();
	}
	
	public function subcategoryFilter($id)
	{
		$subCategory = $this->getContainer()->get('doctrine')->getRepository('AppBundle:Subcategory')->findOneById($id);
		return $subCategory->getName();
	}
	
	public function genreFilter($id)
	{
		$str ="";
		$genre = $this->getContainer()->get('doctrine')->getRepository('AppBundle:PostGenreMapping')->findByPostId($id);
		
		foreach ($genre as $gen){
			$genName = $this->getContainer()->get('doctrine')->getRepository('AppBundle:Genre')->findOneById($gen->getGenreId());
			
			$str .= $genName->getName().", ";
		}
		$newStr =  trim($str,', ');
		return  $newStr;
		
	}
	
	public  function userImageFilter($id){
		$user = $this->getContainer()->get('doctrine')->getRepository('AppBundle:UserProfile')->findOneBy(array('userId'=>$id,'status'=>Constants::COMMENT_ACTIVE));
		return $user->getProfilePic();
	}
	
	public  function userNameFilter($id){
		$user = $this->getContainer()->get('doctrine')->getRepository('AppBundle:User')->findOneById($id);
		return $user->getFirstName()." ".$user->getLastName();
	}
	
	public function getName()
	{
		return 'tag_extension';
	}
}