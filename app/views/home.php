<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
<h1>Welcome to the Home Page</h1>
<p>Name: <?php echo $user['name'] ?? '[Name Unavailable]'; ?></p>
<p>Balance: $<?php echo $user['balance'] ?? '[Balance Unavailable]'; ?></p>

<?php if (!empty($userProperties)): ?>
    <h2>Properties:</h2>
    <ul>
        <?php foreach ($userProperties as $property): ?>
            <li><?php echo $property['name']; ?> - $<?php echo $property['value']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No properties found.</p>
<?php endif; ?>
</body>
</html>
