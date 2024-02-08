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
<form action="info.txt" method="post" class="AddUserForm">

    <section class="UserLogin">
        <label for="username">You Poppet: </label>
        <input type="text" id="username" name="username" required>
    </section>
    <section class="submit-button">
        <input type="submit" value="submit" id="submit">
    </section>
</form>
</body>

</html>