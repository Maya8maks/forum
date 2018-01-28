<?php

?>
<div class="create">

	<p><a href="/admin/post/create">Створити повідомлення</a></p>	
</div>

<table style="border-collapse: collapse;">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">текст</td>
		<td style="border: solid 1px black; padding: 10px">topic_id</td>
		<td style="border: solid 1px black; padding: 10px">назва теми</td>
		<td style="border: solid 1px black; padding: 10px">user_id</td>
		<td style="border: solid 1px black; padding: 10px">імя користувача</td>
		<td style="border: solid 1px black; padding: 10px">дата створення</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	
	$i=0; ?>
	<?php
	
	foreach ($data['post'] as $key => $post) {

		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$post->getText()?></td>
					<td style="border: solid 1px black; padding: 10px">
						<?=$post->getTopic_id()?></td>
						<td style="border: solid 1px black; padding: 10px">
							<?=$post->getTopic_title()?></td>
							<td style="border: solid 1px black; padding: 10px">
								<?=$post->getUser_id()?></td>
								<td style="border: solid 1px black; padding: 10px">
									<?=$post->getUser_name()?></td>
									<td style="border: solid 1px black; padding: 10px">
									<?=date("d.m.Y", strtotime( $post->getCrated_at() ) )?></td>
									<td style="border: solid 1px black; padding: 10px">
										<a href="/admin/post/edit/<?=$post->getId()?>">Редагувати</a></td>
										<td style="border: solid 1px black; padding: 10px">
											<a href="/admin/post/delete/<?=$post->getId()?>">Видалити</a></td>
										</tr>

										<?php
									}
									?>
								</table>
