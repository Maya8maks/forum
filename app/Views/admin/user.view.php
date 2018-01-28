<?php

?>
<div class="create">

	<p><a href="/admin/user/create">Створити користувача</a></p>	
</div>

<table style="border-collapse: collapse;">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">ім'я</td>
		<td style="border: solid 1px black; padding: 10px">email</td>
		<td style="border: solid 1px black; padding: 10px">password</td>
		<td style="border: solid 1px black; padding: 10px">is_admin</td>
		<td style="border: solid 1px black; padding: 10px">vk_id</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	
	$i=0; ?>
	<?php
	
	foreach ($data['user'] as $key => $user) {

		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$user->getName()?></td>
					<td style="border: solid 1px black; padding: 10px">
						<?=$user->getEmail()?></td>
						<td style="border: solid 1px black; padding: 10px">
						<?=$user->getPass()?></td>
						<td style="border: solid 1px black; padding: 10px">
						<?=$user->getIs_admin()?></td>
						<td style="border: solid 1px black; padding: 10px">
						<?=$user->getVk_id()?></td>
							<td style="border: solid 1px black; padding: 10px">
								<a href="/admin/user/edit/<?=$user->getId()?>">Редагувати</a></td>
								<td style="border: solid 1px black; padding: 10px">
									<a href="/admin/user/delete/<?=$user->getId()?>">Видалити</a></td>
								</tr>
								
								<?php
							}
							?>
						</table>
