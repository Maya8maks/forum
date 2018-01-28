<form  method='post' action="/admin/user/create">
	<div>
		<input  name='form[name]' type="text" class="form-control"  placeholder="ім я">
	</div>
	<div>
		<input  name='form[email]' type="email" class="form-control"  placeholder="email">
	</div>
	
	<div>
		<input id="password" class="form-control" type="password" name="form[pass]" placeholder="пароль"value="" >
	</div>
<div>
		<input  type="text" name="form[is_admin]" placeholder="роль 0"value="" >
	</div>
	<div>
		<input  type="text" name="form[vk_id]" placeholder="vk_id"value="" >
	</div>
	<button type="submit" class="button btn btn-primary pull-right ">створити</button>
	
</form>  