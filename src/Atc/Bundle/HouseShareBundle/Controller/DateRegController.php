<?php

namespace Atc\Bundle\HouseShareBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Atc\Bundle\HouseShareBundle\Entity\DateReg;
use Atc\Bundle\HouseShareBundle\Form\DateRegType;

/**
 * DateReg controller.
 *
 * @Route("/datereg")
 */
class DateRegController extends Controller
{
    /**
     * Lists all DateReg entities.
     *
     * @Route("/", name="datereg")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtcHouseShareBundle:DateReg')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new DateReg entity.
     *
     * @Route("/", name="datereg_create")
     * @Method("POST")
     * @Template("AtcHouseShareBundle:DateReg:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new DateReg();
        $form = $this->createForm(new DateRegType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
	          $entity->setAuthor($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('datereg_new'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new DateReg entity.
     *
     * @Route("/new", name="datereg_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AtcHouseShareBundle:DateReg')->findAll();
      
        $entity = new DateReg();
        $form   = $this->createForm(new DateRegType(), $entity);

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DateReg entity.
     *
     * @Route("/{id}", name="datereg_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtcHouseShareBundle:DateReg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DateReg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DateReg entity.
     *
     * @Route("/{id}/edit", name="datereg_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtcHouseShareBundle:DateReg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DateReg entity.');
        }

        $editForm = $this->createForm(new DateRegType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing DateReg entity.
     *
     * @Route("/{id}", name="datereg_update")
     * @Method("PUT")
     * @Template("AtcHouseShareBundle:DateReg:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtcHouseShareBundle:DateReg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DateReg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DateRegType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('datereg_new'));
            
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a DateReg entity.
     *
     * @Route("/{id}", name="datereg_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtcHouseShareBundle:DateReg')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DateReg entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('datereg_new'));
    }

    /**
     * Creates a form to delete a DateReg entity by id.
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
}
