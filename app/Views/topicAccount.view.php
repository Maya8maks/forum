<h1>Мої теми</h1>

<ul>
	<?php 
	foreach ($data['topic'] as $key => $topic) {
		?>
		<li>
			<?=$topic->getTitle() ?>
		</li>
		
		<?php
	}
	?>
</ul>
