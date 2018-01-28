<form  method='post' action="/admin/topic/edit/<?=$data['topic']->getId()?>">

	<div>
		<input  name='edit[title]' type="text" value="<?=$data['topic']->getTitle()?>">
	</div>
	<select name="edit[section_id]" id="">
		<?php
		foreach ($data['section'] as $key => $section) {
			?>
			<option value="<?=$section->getId()?>"<?=($section->getId()==$data['topic']->getSection_id()) ? 'selected' : '' ?>><?=$section->getTitle()?></option>
			<?php
		}
		?>
	</select>
	<button type="submit">редагувати</button>
</form>  