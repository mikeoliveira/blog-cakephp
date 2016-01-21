<!-- File: /app/View/Posts/index.ctp -->

<h1>Posts do Blog</h1>
<?php
    echo 'Bem Vindo '.$user_data['User']['username'];
    echo '<br> Nivel de Acesso: '. $user_data['User']['role'];
?>
<?php

    echo $this->Html->link('<i class="fa fa-plus"></i> Add Post', 
            array('controller' => 'posts', 'action' => 'add'), 
            array('class'=>'btn btn-primary margin-button col-md-2', 'escape'=>false)
            );
    echo $this->Html->link('<i class="fa fa-list"></i> list Users', 
        array('controller' => 'users', 'action' => 'index'), 
        array('class'=>'btn btn-primary margin-button col-md-2', 'escape'=>false)
        );
    
    echo $this->Html->link('<i class="fa fa-sign-out"></i> Logout', 
        array('controller' => 'users', 'action' => 'logout'), 
        array('class'=>'btn btn-danger margin-button pull-right', 'escape'=>false)
        );   
?>

<table class="table table-striped">
    <tr class="info">
        <th>Id</th>
        <th>Título</th>
        <th>Ações</th>
        <th>Data de Criação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->

<?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link(
                    '<i class="fa fa-search"></i> '.$post['Post']['title'], 
                    array('action' => 'view', $post['Post']['id']),
                    array('class'=>'btn btn-default', 'escape'=> false)
                    );?>
                </td>
                <td>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class'=>'fa fa-trash')).' Deletar',
                array('action' => 'delete', $post['Post']['id']),
                array('escape'=>false, 'class'=>'btn btn-danger', 'confirm' => 'Voce tem Certeza?')
            );?>
            <?php echo $this->Html->link(
                    $this->Html->tag('i','',array('class'=>'fa fa-pencil-square-o')).' Editar', 
                    array('action' => 'edit', $post['Post']['id']),
                    array('escape'=>false, 'class'=>'btn btn-info')
                    );?>
        </td>
        <td><?php echo $this->Time->format($post['Post']['created'],'%d/%m/%Y %H:%M %p') ?></td>
    </tr>
<?php endforeach; ?>

</table>
