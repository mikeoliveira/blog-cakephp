<!-- File: /app/View/Posts/view.ctp -->

<a class="btn btn-info" href="/blogCake/posts"> <i class="fa fa-arrow-circle-left"></i> Voltar</a>

<h1><?php echo $post['Post']['title']?></h1>

<p><small>Criado em: <?php echo $this->Time->format($post['Post']['created'],'%d/%m/%Y %H:%M %p')?></small></p>

<p class="text-left"><?php echo $post['Post']['body']?></p>
