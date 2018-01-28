<form  method='post' action="/admin/post/edit/<?=$data['post']->getId()?>">
	<div>
		<input  name='edit[text]' type="text" value="<?=$data['post']->getText()?>">
	</div>
	<select name="edit[topic_id]" id="">
		<?php
		foreach ($data['topic'] as $key => $topic) {
			?>
			<option value="<?=$topic->getId()?>"<?=($topic->getId()==$data['post']->getTopic_id()) ? 'selected' : " "?>
				><?=$topic->getTitle()?></option>
				<?php
			}
			?>
		</select>
		<button type="submit" class="button btn btn-primary pull-right ">редагувати</button>
		
	</form>  