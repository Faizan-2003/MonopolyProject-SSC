<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>
<body>
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
        <input type="submit" value="submit" name="submit" id="submit">
    </section>

    <!-- Add a message element -->
    <div id="message"></div>
</form>
<script>
    <?php include __DIR__ . '/../public/Javascript/Monopoly.js'; ?>
</script>
</body>
</html>
