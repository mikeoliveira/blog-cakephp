<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Users</h1>
<a class="btn btn-info" href="/blogCake/posts"> <i class="fa fa-arrow-circle-left"></i> Voltar</a>
<?php
    echo $this->Form->create('User', array(
   'action' => 'edit',
   'inputDefaults' => array(    
    'div' => array('class' => 'control-group'),  
    'label' => array('class' => 'control-label'),
    'class' => 'form-control',
    'error' => array(
        'attributes' => array('wrap' => 'span', 'class' => 'bg-danger error-message')
    ))));
  
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->button('<i class="fa fa-floppy-o"></i> Salvar Usuário',
            array(  'type'=> 'submit',
                    'class'=> 'btn btn-primary margin-button',
                    'scape'=> false
                ));

