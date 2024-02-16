<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
<h1>Welcome to the Home Page</h1>
<p>Name: <?php echo $user['userName'] ?? '[Name Unavailable]'; ?></p>
<p>Balance: $<?php echo $user['balanceAmount'] ?? '[Balance Unavailable]'; ?></p>

<?php if (!empty($properties)): ?>
    <h2>Properties:</h2>
    <ul>
        <?php foreach ($properties as $property): ?>
            <li><?php echo $property['propertyName'] ?? '[Property Name Unavailable]'; ?> - $<?php echo $property['propertyPrice'] ?? '[Property Value Unavailable]'; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No properties found.</p>
<?php endif; ?>
</body>
</html>
