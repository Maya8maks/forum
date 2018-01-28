<form  method='post' action="/admin/user/edit/<?=$data['user']->getId()?>">
	<div>
		<input  name='edit[name]' type="text" value="<?=$data['user']->getName()?>">
	</div>
	<div>
		<input  name='edit[email]' type="email" value="<?=$data['user']->getEmail()?>">
	</div>
	
	<div>
		<input id="password" class="form-control" type="password" name="edit[pass]" value="<?=$data['user']->getPass()?>">
	</div>
	<div>
		<input  type="text" name="edit[is_admin]" value="<?=$data['user']->getIs_admin()?>">
	</div>
	<div>
		<input  type="text" name="edit[vk_id]" value="<?=$data['user']->getVk_id()?>">
	</div>
	<button type="submit" class="button btn btn-primary pull-right ">редагувати</button>
	
</form>  