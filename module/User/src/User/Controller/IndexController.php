<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use User\Entity\User;
use User\Form\UserForm;

class IndexController extends AbstractActionController
{
    protected $em;

    public function indexAction()
    {
        $users = $this->getEntityManager()->getRepository('User\Entity\User')->findAll();
        return new ViewModel(array(
            'users' => $users,
        ));
    }

    public function createAction()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('创建');
        $request = $this->getRequest();
        if( $request->isPost() ){
            $user = new User();
            $form->setInputFilter( $user->getInputFilter() );
            $form->setData( $request->getPost() );

            if( $form->isValid() ){
                $user->exchangeArray( $form->getData() );
                $this->getEntityManager()->persist($user);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('user');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        if( !$id ) return $this->redirect()->toRoute('user');
        $user = $this->getEntityManager()->find('User\Entity\User', $id);
        if( !$user ) return $this->redirect()->toRoute('user');
        $form = new UserForm();
        $form->bind($user);
        $form->get('submit')->setValue('修改');

        $request = $this->getRequest();
        if( $request->isPost() ){
            $form->setInputFilter( $user->getInputFilter() );
            $form->setData( $request->getPost() );

            if( $form->isValid() ){
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('user');
            }
        }
        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if( !$id ){
            return $this->redirect()->toRoute('album');
        }
        $request = $this->getRequest();
        if( $request->isPost() ){
            $del = $request->getPost('del', 'No');
            if( $del == 'Yes' ){
                $id = (int) $request->getPost('id');
                $user = $this->getEntityManager()->find('User\Entity\User', $id);
                $this->getEntityManager()->remove($user);
                $this->getEntityManager()->flush();
            }
            return $this->redirect()->toRoute('user');
        }
        return [
            'id' => $id,
            'user' => $this->getEntityManager()->find('User\Entity\User', $id),
        ];
    }

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    /**
     * OneToMany demo
     */
    public function OrdersAction()
    {
        $entity = $this->getEntityManager()->find('User\Entity\User', 1);
        $orders = $entity->getOrders();
        foreach ($orders as $order){
            echo $order->getGoods()."<br>";
        }
        exit;
    }
}