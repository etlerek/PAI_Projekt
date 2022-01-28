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
                <?php
                session_start();
                if(isset( $_SESSION['sess_user'])){
//                    echo "Witaj " . $_SESSION['sess_user']. "!<br>";
//                    echo ("<a href='logout.php'>Wyloguj</a>");
                }
                ?>
				<button class="button-1" name = 'login' type="submit">login</button>
				<button class="button-2" name = 'register' type="submit">register</button>
			</form>
		</div>
    </div>
</body>

</html>