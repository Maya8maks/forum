<form  method='post' action="/admin/section/edit/<?=$data['section']->getId()?>">
	<div>
		<input  name='edit[title]' type="text" value="<?=$data['section']->getTitle()?>">
	</div>
	<div>
		<input  name='edit[slug]' type="text" value="<?=$data['section']->getSlug()?>">
	</div>
	
	
	<button type="submit" class="button btn btn-primary pull-right ">редагувати</button>
	
</form>  