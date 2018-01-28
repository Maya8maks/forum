<ul>
	<?php
	foreach($data['query'] as $section) {
		?>

		<li><a href="/section/<?=$section['slug']?>"><?=$section['title']?></a></li>

		<?php } ?>
	</ul>