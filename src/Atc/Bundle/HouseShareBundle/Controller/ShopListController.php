<?php

namespace Atc\Bundle\HouseShareBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Atc\Bundle\HouseShareBundle\Entity\ShopList;
use Atc\Bundle\HouseShareBundle\Form\ShopListType;

/**
 * ShopList controller.
 *
 * @Route("/shoplist")
 */
class ShopListController extends Controller
{
    /**
     * Lists all ShopList entities.
     *
     * @Route("/", name="shoplist")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtcHouseShareBundle:ShopList')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new ShopList entity.
     *
     * @Route("/", name="shoplist_create")
     * @Method("POST")
     * @Template("AtcHouseShareBundle:ShopList:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ShopList();
        $form = $this->createForm(new ShopListType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
	          $entity->setAuthor($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ShopList entity.
     *
     * @Route("/new", name="shoplist_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ShopList();
        $form   = $this->createForm(new ShopListType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ShopList entity.
     *
     * @Route("/{id}", name="shoplist_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtcHouseShareBundle:ShopList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ShopList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ShopList entity.
     *
     * @Route("/{id}/edit", name="shoplist_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtcHouseShareBundle:ShopList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ShopList entity.');
        }

        $editForm = $this->createForm(new ShopListType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }


    /**
     * Edits an existing ShopList entity.
     *
     * @Route("/{id}", name="shoplist_update")
     * @Method("PUT")
     * @Template("AtcHouseShareBundle:ShopList:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtcHouseShareBundle:ShopList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ShopList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ShopListType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('shoplist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ShopList entity.
     *
     * @Route("/{id}", name="shoplist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtcHouseShareBundle:ShopList')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ShopList entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('shoplist'));
    }

    /**
     * Creates a form to delete a ShopList entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    /**
     * Mark an article bought by a user
     *
     * @Method("DELETE")
     * @Route("/bought/{id}", name="shoplist_bought")
     */
     public function boughtArticleAction(Request $request, $id){
	      $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AtcHouseShareBundle:ShopList')->find($id);
         if (!$article) {
	            throw $this->createNotFoundException('Unable to find ShopList entity.');
	        }
        $article->setBuyer($this->getUser());
				$article->setIsBought('1');
        $em->persist($article);
        $em->flush();
        
        return $this->redirect($this->generateUrl('home'));
     }
}
