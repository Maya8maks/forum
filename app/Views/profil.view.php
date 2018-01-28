<form  method='post' action="/account/profil">
	<div>
	<input  name='form[name]' type="text" class="form-control"  placeholder=<?=$data['user']->getName()?>>
	</div>
	<div>
		<input  name='form[email]' type="text" class="form-control"  placeholder="<?=$data['user']->getEmail()?>">
	</div>

	<div>
		<input id="password" class="form-control" type="password" name="form[pass]" placeholder="Ваш пароль"value="" >
	</div>

	<button type="submit" class="button btn btn-primary pull-right ">Змінити</button>

</form>  