<?php

?>
<div class="create">
	<p><a href="/admin/topic/create">Створити тему</a></p>	
</div>
<table style="border-collapse: collapse;">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">назва</td>
		<td style="border: solid 1px black; padding: 10px">secton_id</td>
		<td style="border: solid 1px black; padding: 10px">назва секції</td>
		<td style="border: solid 1px black; padding: 10px">user_id</td>
		<td style="border: solid 1px black; padding: 10px">імя користувача</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	$i=0; ?>
	<?php
		foreach ($data['topic'] as $key => $topic) {

		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$topic->getTitle()?></td>
					<td style="border: solid 1px black; padding: 10px">
						<?=$topic->getSection_id()?></td>
						<td style="border: solid 1px black; padding: 10px">
							<?=$topic->getSection_title()?></td>
							<td style="border: solid 1px black; padding: 10px">
								<?=$topic->getUser_id()?></td>
								<td style="border: solid 1px black; padding: 10px">
									<?=$topic->getUser_name()?></td>
									<td style="border: solid 1px black; padding: 10px">
										<a href="/admin/topic/edit/<?=$topic->getId()?>">Редагувати</a></td>
										<td style="border: solid 1px black; padding: 10px">
											<a href="/admin/topic/delete/<?=$topic->getId()?>">Видалити</a></td>
										</tr>

										<?php
									}
									?>
								</table>
