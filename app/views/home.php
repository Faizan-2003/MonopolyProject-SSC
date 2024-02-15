<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>

<body>
<h1>Welcome to Monopoly Inholland</h1>
<?php if ($user) : ?>
    <h2>Name: <?php echo $user['userName']; ?></h2>
    <h2>Amount Money: $<?php echo $user['balanceAmount']; ?></h2>
<?php else : ?>
    <h2>Name: [Name Unavailable]</h2>
    <h2>Amount Money: $---</h2>
<?php endif; ?>

<table>
    <thead>
    <tr>
        <th>Your Properties</th>
        <th>Property Cost</th>
        <th>Property Fine</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Name Property</td>
        <td>$$$</td>
        <td>$$$</td>
    </tr>
    <!-- Add more rows as needed -->
    </tbody>
</table>
</body>

</html>
