<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Post
 * @author WITIX_TWO
 */
class Post extends AppModel {
    public $name = 'Post';
   
    public $validate = array(
        'title' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Letras e numeros Somente'
        ),
        'body' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Minimo 8 caracteres !'
        )
    );
    
    public function isOwnedBy($post, $user) {
        var_dump($user); exit();
        return $this->field('id', array('id' => $post, 'user_id' => $user)) == $post;
    }    
    
}
