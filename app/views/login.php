<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/ssc.png">

    <title>Login | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>
<body>
<a href="/homepage"><img class="mb-4" src="/images/ssc.png" alt="Website Logo" width="350" height="150"></a>
<h1><strong>Monopoly - Login</strong></h1>
<form method="post" class="AddUserForm" id="loginForm">
    <section class="UserLogin">
        <label for="username">Your Poppet: </label>
        <input type="text" id="username" name="username" required>
    </section>
    <section class="submit-button">
        <input type="submit" value="Login" id="submit">
    </section>
</form>
<script>
    <?php include __DIR__ . '/../public/Javascript/Monopoly.js'; ?>
</script>
</body>
</html>
