<?php

namespace Atc\Bundle\HouseShareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Atc\Bundle\HouseShareBundle\Entity\ShopList;
use Atc\Bundle\HouseShareBundle\Form\ShopListType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;

/**
 * main controller.
 *
 * @Route("/")
 *
 */
class DefaultController extends Controller
{
    /**
     * index of app.
     *
     * @Route("/unauthorized", name="index")
     * @Method("GET")
     * 
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * home of app.
     *
     * @Route("/", name="home")
     * @Method("GET")
     * @Secure(roles="ROLE_USER_FAMILY")
     * @Template()
     */
    public function homeAction()
    { 
        $em = $this->getDoctrine()->getManager();
        $shoplist = $em->getRepository('AtcHouseShareBundle:ShopList')->findAll();
        $posts = $em->getRepository('AtcHouseShareBundle:Post')->findAll();

        return array(
            'shoplist' => $shoplist,
            'postlist' => $posts,
        );
    }
    
    /**
     * home of app.
     *
     * @Route("/calendrier", name="calendar")
     * @Method("GET")
     * @Secure(roles="ROLE_USER_FAMILY")
     * @Template()
     */
    public function calendarAction()
    { 
        $em = $this->getDoctrine()->getManager();
        $calEvent = $em->getRepository('AtcHouseShareBundle:DateReg')->findAll();

        return array(
            'calevent' => $calEvent,
        );
    }
    /**
     * home of admin.
     *
     * @Route("/admin", name="admin")
     * @Method("GET")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function adminAction()
    { 
        $userManager = $this->get('fos_user.user_manager');
        $this->users = $userManager->findUsers();
        
        return array(
            'users' => $this->users,
        );
    }
    /**
     * home of admin.
     *
     * @Route("/consigne", name="consigne")
     * @Method("GET")
     * @Secure(roles="ROLE_USER_FAMILY")
     * @Template()
     */
    public function consigneAction()
    { 
        
        return array(
            
        );
    }
    /**
     * home of admin.
     *
     * @Route("/admin_promote/{username}", name="admin_promote")
     * @Method("GET")
     * @Secure(roles="ROLE_ADMIN")
     * 
     */
    public function promoteAction(Request $request, $username)
    { 
        $userManipulator = $this->get('fos_user.util.user_manipulator');
        $userManipulator->addRole($username, 'ROLE_USER_FAMILY');
        
        return $this->redirect($this->generateUrl('admin'));
    }
}
