
<!-- Authorization form -->
<div id="login" class="tab-content-min z-depth-3 register-form">
	<form action="/account/login" method="post" class="formBox">
		<div class="inputBox flex-center">
			<label for="" class="labelText">Почта</label>
			<input type="text" required name="email" class="userInput">
		</div>
		<div class="inputBox flex-center">
			<label for="" required class="labelText">Пароль</label>
			<input type="password" name="password" class="userInput">
		</div>
		<div class="inputBox flex-center">
			<label class="checkbox">
				<input id="checkbox" name="remember" type="checkbox">
				<div class="checkbox__text">Запомнить меня</div>
			</label>
		</div>
		<div class="inputBox">
			<button type="submit" data-ripple-color="#abd" class="userInput z-depth-1 material-ripple">Войти</button>
		</div>
		<div class="text-white text-center"><a class="a" href="/">На главную</a></div>
	</form>
</div>

<div id="notification"></div>
<script src="/public/scripts/form.js"></script>
<script src="/public/scripts/script.js"></script>