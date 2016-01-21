<!-- app/View/Users/add.ctp -->
<div class="users form">
 <?php if($this->Session->read('Auth')){ ?>
<a class="btn btn-info" href="/blogCake/posts"> <i class="fa fa-arrow-circle-left"></i> Voltar</a>
 <?php }else{ ?>
<a class="btn btn-info" href="/blogCake/users/login"> <i class="fa fa-arrow-circle-left"></i> Voltar ao Login</a>
 <?php } ?>
<?php echo $this->Form->create('User', 
    array(
    'inputDefaults' => array(    
    'div' => array('class' => 'control-group'),  
    'label' => array('class' => 'control-label'),
    'class' => 'form-control',
    'error' => array(
        'attributes' => array('wrap' => 'span', 'class' => 'bg-danger error-message')
    ))));?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
