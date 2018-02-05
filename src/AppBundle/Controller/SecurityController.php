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
echo"1";
        if ($error) {
            $error = "bad-credentials";
            $this->get('session')->getFlashBag()->add('error', $error);
        }
        echo"2";
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($this->get('security.authorization_checker')->isGranted('ROLE_AFFILIATE')) {
            return new RedirectResponse($this->container->get('router')->generate('affiliate_my_account_dashboard'));
        }
        echo"3";
        return $this->render('register/login.html.twig', array(
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
