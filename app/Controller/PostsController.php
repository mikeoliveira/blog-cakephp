<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP PostsController
 * @author WITIX_TWO
 */
class PostsController extends AppController {
    public $name = 'Posts';
    public function index() {
        $this->set('posts', $this->Post->find('all'));
        $this->set('user_data', $this->Session->read('Auth'));
    }
    
    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); // Salva o id do usuário logado
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Seu Posts foi salvo!',
                'default',
                array('class' => 'alert alert-success text-center'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    function edit($id = null) {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->findById($id);
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Seu Post foi alterado.',
                'default',
                array('class' => 'alert alert-success text-center'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Session->SetFlash('O Post com id: ' . $id . ' foi deletado.',
                'default',
                array('class' => 'alert alert-danger text-center'));
            $this->redirect(array('action' => 'index'));
        }
    }    
    
    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            if ($this->action === 'add') {
                // Todos os usuários registrados podem criar posts
                return true;
            }
            if (in_array($this->action, array('edit', 'delete'))) {
                $postId = (int) $this->request->params['pass'][0];
                return $this->Post->isOwnedBy($postId, $user['id']);
            }
        }
        return false;
    }
    
}
