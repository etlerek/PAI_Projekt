<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_login.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <img class = "logo" src="public/imgs/logo1.svg">
		<div class = "login_container">
			<form action = "login" method="POST">
                <div class="messages">
                    <p>Zaloguj się! </p>
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
				<input name = "email" type="text" placeholder="email">
				<input name = "password" type="password" placeholder="password">
				<button class="button-1" type="submit">login</button>
				<button class="button-2">register</button>
			</form>
		</div>
    </div>
</body>

</html>