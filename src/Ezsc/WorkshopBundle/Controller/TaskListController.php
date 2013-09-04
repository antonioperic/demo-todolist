<?php

namespace Ezsc\WorkshopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ezsc\WorkshopBundle\Entity\TaskList;
use Ezsc\WorkshopBundle\Form\TaskListType;

use Ezsc\WorkshopBundle\Entity\Task;
use Ezsc\WorkshopBundle\Form\TaskType;

/**
 * TaskList controller.
 *
 */
class TaskListController extends Controller
{

    /**
     * Lists all TaskList entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EzscWorkshopBundle:TaskList')->findAll();

        return $this->render('::frontend/ToDoBundle/taskList.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TaskList entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TaskList();
        $form = $this->createForm(new TaskListType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                        'notice',
                        'New task list has been created!'
                    );

            return $this->redirect($this->generateUrl('practice_task-list'));
        }

        return $this->render('EzscWorkshopBundle:TaskList:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TaskList entity.
     *
     */
    public function newAction()
    {
        $entity = new TaskList();
        $form   = $this->createForm(new TaskListType(), $entity);

        return $this->render('::frontend/ToDoBundle/taskListAdd.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TaskList entity.
     *
     */
    public function showAction($id, $order = null)
    {
        $em = $this->getDoctrine()->getManager();
        
        if(!$order)
            $order = 'DESC';

        $entity = $em->getRepository('EzscWorkshopBundle:TaskList')->find($id);
        
        $task = new Task();
        $taskForm   = $this->createForm(new TaskType(), $task);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('::frontend/ToDoBundle/toDoList.html.twig', array(
                    'entity'      => $entity,
                    'entities' => $em->getRepository('EzscWorkshopBundle:Task')->findTasks($id, $order),
                    'task_form' => $taskForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                    'next_order' => ($order == 'ASC')? 'DESC' : 'ASC'
                ));
    }

    /**
     * Displays a form to edit an existing TaskList entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EzscWorkshopBundle:TaskList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskList entity.');
        }

        $editForm = $this->createForm(new TaskListType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('::frontend/ToDoBundle/taskListEdit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TaskList entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EzscWorkshopBundle:TaskList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TaskListType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                        'notice',
                        'Task list has been updated!'
                    );
            
            return $this->redirect($this->generateUrl('practice_task-list_edit', array('id' => $id)));
        }

        return $this->render('EzscWorkshopBundle:TaskList:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TaskList entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EzscWorkshopBundle:TaskList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskList entity.');
        }
        
        $this->get('session')->getFlashBag()->add(
                   'notice',
                    'Task list has been deleted!'
                );

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('practice_task-list'));
    }

    /**
     * Creates a form to delete a TaskList entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
