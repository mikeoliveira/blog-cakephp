<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<a class="btn btn-info" href="/blogCake/posts"> <i class="fa fa-arrow-circle-left"></i> Voltar</a>
<?php
echo $this->Form->create('Post', array(
    'inputDefaults' => (
        array(
            'div' => array('class' => 'control-group'),  
            'label' => array('class' => 'control-label'),
            'class' => 'form-control'    
        )   
    )
));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->button('<i class="fa fa-floppy-o"></i> Salvar Post',
            array(  'type'=> 'submit',
                    'class'=> 'btn btn-primary margin-button',
                    'scape'=> false
                ));
