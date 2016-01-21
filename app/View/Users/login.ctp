<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array(
    'inputDefaults' => (
        array(
            'div' => array('class' => 'control-group'),  
            'label' => array('class' => 'control-label'),
            'class' => 'form-control'    
        )   
    )
));?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>
