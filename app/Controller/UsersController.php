<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP UsersController
 * @author WITIX_TWO
 */
class UsersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add'); // Permitindo que os usuários se registrem
    }
    
    public function login() {
        if ($this->Auth->login()) {
            $this->Session->setFlash('Login realizado com sucesso!',
                'default',
                array('class' => 'alert alert-success text-center'));            
            $this->redirect($this->Auth->redirect());

        } else {
            $this->Session->setFlash('Usuário ou senha invalidos!',
                'default',
                array('class' => 'alert alert-danger text-center'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    } 

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
        $this->set('user_data', $this->Session->read('Auth'));
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário Invalido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Cadastro efetuado com Sucsso!',
                'default',
                array('class' => 'alert alert-success text-center'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error ao realizar Cadastro!',
                'default',
                array('class' => 'alert alert-danger text-center'));
            }
        }
    }
    
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Invalido!'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Usuário editado com Sucesso!',
                'default',
                array('class' => 'alert alert-success text-center'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error ao realizar edição!',
                'default',
                array('class' => 'alert alert-danger text-center'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('Usuário deletado com Sucsso!',
                'default',
                array('class' => 'alert alert-success text-center'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Error ao excluir usuário!',
                'default',
                array('class' => 'alert alert-danger text-center'));
        $this->redirect(array('action' => 'index'));    
    }
}
