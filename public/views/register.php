<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_login.css">
    <script type = text/javascript src="./public/js/script.js" crossorigin="anonymous" defer></script>
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <img class = "logo" src="public/imgs/logo1.svg">
		<div class = "login_container">
			<form action = "register" method="POST">
                <div class="messages">
                    <p>Zarejestruj się! </p>
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <input name="confirmedPassword" type="password" placeholder="confirm password">
                <input name="nickname" type="text" placeholder="nickname">
                <input name="name" type="text" placeholder="name">
                <input name="surname" type="text" placeholder="surname">
				<button class="button-2" type="submit">register</button>
			</form>
		</div>
    </div>
</body>

</html>