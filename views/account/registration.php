<!-- ==== REGISTRATION FORM ==== -->

<div id="register" class="tab-content z-depth-3 register-form">
	<form action="/account/registration" method="post" class="formBox">
		<div class="inputBox flex-center">
			<label for="" class="labelText">Название</label>
			<input type="text" required name="name" class="userInput">
		</div>
		<div class="inputBox flex-center">
			<label for="" class="labelText">Почта</label>
			<input type="email" required name="email" class="userInput">
		</div>
		<div class="inputBox flex-center">
			<label for="" class="labelText">Описание <span class="h6">(Необязательно)</span></label>
			<textarea type="text" name="inform" class="userInput input-inform"></textarea>
		</div>
		<div class="inputBox flex-center">
			<label for="" required class="labelText">Пароль</label>
			<input type="password" required name="password" class="userInput">
		</div>
		<div class="inputBox">
			<button type="submit"  name="registration" data-ripple-color="#abd" class="userInput z-depth-1 material-ripple">Создать аккаунт</button>
		</div>
		<div class="text-white text-center"><a class="a" href="/">На главную</a></div>
	</form>
</div>


<div id="notification">

</div>

<script src="/public/scripts/ripple.js"></script>
<script src="/public/scripts/form.js"></script>
<script src="/public/scripts/script.js"></script>
