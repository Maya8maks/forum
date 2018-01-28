<h1>Мої повідомлення</h1>

<ul>
	<?php 
	foreach ($data['post'] as $key => $post) {
		?>
		<li>
			<?=$post->getText() ?>
		</li>
		
		<?php
	}
	?>
</ul>