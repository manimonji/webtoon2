<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/signup.css">
    <title>Document</title>
</head>
<body>
	<main>
		<h1 class="title">ثبت نام</h1>
		<form action="signup_result.php" method="POST">
			<input type="text" id="username" name="username" placeholder="نام کاربری">
			<input type="email" id="email" name="email" placeholder="ایمیل">
			<input type="password" id="password" name="password" placeholder="رمز عبور">
			<input type="submit" value="ثبت نام">
		</form>
	</main>
</body>
</html>