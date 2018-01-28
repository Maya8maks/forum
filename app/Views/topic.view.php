<form method='post'>
	<textarea type="text" cols="30" rows="3" name='form[post]' placeholder="Повідомлення"></textarea>
	<button type="submit">Додати повідомлення</button>
</form>
<?php

?>
<h1>Pозділ: <?=$data['section'][0]->getTitle()?></h1>
<h2>Тема:<?=$data['topic']->getTitle()?></h2>
<h2>Повідомлення:</h2>
<ul>
    <?php 
        foreach($data['post'] as $post) {
       ?>
     <li><?=$post->getUser_name().": ".$post->getText()?></li>
     <?php } ?>
</ul>