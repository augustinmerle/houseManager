<?php

namespace Atc\Bundle\HouseShareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Atc\Bundle\HouseShareBundle\Entity\ShopList;
use Atc\Bundle\HouseShareBundle\Form\ShopListType;
use JMS\SecurityExtraBundle\Annotation\Secure;


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
     * @Route("/", name="index")
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
     * @Route("/home", name="home")
     * @Method("GET")
     * @Secure(roles="ROLE_USER")
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
}
