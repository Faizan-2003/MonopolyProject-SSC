<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/ssc.png">

    <title>Admin | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>
<body>
<h1><strong>Monopoly - Add User</strong></h1>
<form method="post" class="AddUserForm" id="addUserForm">
    <section class="NameSignUp">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </section>

    <section class="PoppetSignUp">
        <label for="poppet">Poppet:</label>
        <input type="text" id="poppet" name="poppet" required>
    </section>

    <section class="submit-button">
        <input class="btn-primary" type="submit" value="Add user" name="submit" id="submit">
    </section>

    <div id="message"></div>
    <section>
        <input class="btn-primary-return" id="return" type="button" value="Return">
    </section>
</form>

</body>
</html>
<script>
    <?php include __DIR__ . '/../public/Javascript/Monopoly.js'; ?>
</script>
