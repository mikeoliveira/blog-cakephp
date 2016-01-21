
<!-- File: /app/View/Users/index.ctp -->

<h1>Usuarios</h1>
<div class='row'>
<?php

    echo $this->Html->link('<i class="fa fa-plus"></i> Add Users', 
            array('controller' => 'users', 'action' => 'add'), 
            array('class'=>'btn btn-primary margin-button col-md-2', 'escape'=>false)
            );
    
    echo $this->Html->link('<i class="fa fa-list"></i> List Post', 
        array('controller' => 'posts', 'action' => 'index'), 
        array('class'=>'btn btn-primary margin-button col-md-2', 'escape'=>false)
        );
    
    echo $this->Html->link('<i class="fa fa-sign-out"></i> Logout', 
        array('controller' => 'users', 'action' => 'logout'), 
        array('class'=>'btn btn-danger margin-button pull-right', 'escape'=>false)
        );
?>
</div>
<table class="table table-striped">
    <tr class="info">
        <th>Id</th>
        <th>Usuários</th>
        <th>Ações</th>
        <th>Data de Criação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->

<?php foreach ($users as $users): ?>
    <tr>
        <td><?php echo $users['User']['id']; ?></td>
        <td>
            <?php echo '<h4>'.$users['User']['username'].'</h4>'?></td>
                <td>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class'=>'fa fa-trash')).' Deletar',
                array('action' => 'delete', $users['User']['id']),
                array('escape'=>false, 'class'=>'btn btn-danger', 'confirm' => 'Voce tem Certeza?')
            );?>
            <?php echo $this->Html->link(
                    $this->Html->tag('i','',array('class'=>'fa fa-pencil-square-o')).' Editar', 
                    array('action' => 'edit', $users['User']['id']),
                    array('escape'=>false, 'class'=>'btn btn-info')
                    );?>
        </td>
        <td><?php echo $this->Time->format($users['User']['created'],'%d/%m/%Y %H:%M %p') ?></td>
    </tr>
<?php endforeach; ?>

</table>
