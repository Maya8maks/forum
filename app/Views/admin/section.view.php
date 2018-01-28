<?php

?>
<div class="create">

	<p><a href="/admin/section/create">Створити розділ</a></p>	
</div>

<table style="border-collapse: collapse;">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">назва</td>
		<td style="border: solid 1px black; padding: 10px">slug</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	
	$i=0; ?>
	<?php
	
	foreach ($data['section'] as $key => $section) {

		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$section->getTitle()?></td>
					<td style="border: solid 1px black; padding: 10px">
						<?=$section->getSlug()?></td>
						<td style="border: solid 1px black; padding: 10px">
						<a href="/admin/section/edit/<?=$section->getId()?>">Редагувати</a></td>
							<td style="border: solid 1px black; padding: 10px">
								<a href="/admin/section/delete/<?=$section->getId()?>">Видалити</a></td>
							</tr>

							<?php
						}
						?>
					</table>
