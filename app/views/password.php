<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>
<body>
<img src="../public/images/ssc.png" alt="Example Image">
<form method="post" class="AddUserForm" id="loginForm">
    <section class="UserLogin">
        <label for="password">Your Admin Password: </label>
        <input type="password" id="password" name="password" required>
    </section>
    <section class="submit-button">
        <input type="submit" value="Submit" id="submit">
    </section>
</form>
<script>
    <?php include __DIR__ . '/../public/Javascript/Monopoly.js'; ?>
</script>
</body>
</html>
