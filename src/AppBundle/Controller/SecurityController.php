<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Affiliate\Model\Affiliate;

/**
 * Security controller.
 *
 */
class SecurityController extends Controller
{

    /**
     * Sign in Action
     */
    public function loginAction(Request $request)
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        if ($error) {
            $error = "bad-credentials";
            $this->get('session')->getFlashBag()->add('error', $error);
        }
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
       // print_r($lastUsername);exit;
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
        	//Redirect to myaccount
        	return  $this->redirect($this->generateUrl('my_feed'));
        }

        echo"3";
        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        	'title'=>'Login'
        ));
    }
    
    /**
     * @param Request $request
     */
    public function checkAction(Request $request)
    {
    
    }
    
    /**
     * @param Request $request
     */
    public function logoutAction(Request $request)
    {
    
    }
    
}
