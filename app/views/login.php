<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>
<body>
<img src="../public/images/ssc.png" alt="Example Image">
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
