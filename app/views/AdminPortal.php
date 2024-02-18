<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/ssc.png">
    <title>Home | Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>
</head>

<body>
<a href="/homepage"><img class="mb-4" src="/images/ssc.png" alt="Website Logo" width="350" height="150"></a>
    <h1>Welcome to Monopoly Inholland Admin Portal</h1>
<button class="btn-primary" onclick="window.location.href='/adduser'">Add User Page</button>

<table class="second-table">
    <thead>
    <tr>
        <th>Property Name</th>
        <th>Property Cost</th>
        <th>Owner Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($additionalproperties as $property): ?>
        <tr>
            <td><?php echo $property['propertyName'] ?? '[Property Name Unavailable]'; ?></td>
            <td>$<?php echo $property['propertyPrice'] ?? '---'; ?></td>
            <td><?php echo $property['OwnerName'] ?? '---'; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    <?php include __DIR__ . '/../public/Javascript/Monopoly.js'; ?>
</script>
</body>

</html>