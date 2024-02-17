<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>

    </style>
</head>
<body>
<h1>Welcome to Monopoly Inholland</h1>
<h2>Name: <?php echo $user['userName'] ?? '[Name Unavailable]'; ?></h2>
<h2>Amount Money: $<?php echo $user['balanceAmount'] ?? '---'; ?></h2>
<?php if (!empty($properties)): ?>
    <table>
        <thead>
        <tr>
            <th>Your Properties</th>
            <th>Property Cost</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($properties as $property): ?>
            <tr>
                <td class="property-cell" data-property-id="<?php echo $property['propertyID'] ?? ''; ?>">
                    <?php echo $property['propertyName'] ?? '[Property Name Unavailable]'; ?></td>
                <td>$<?php echo $property['propertyPrice'] ?? '---'; ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
<?php else: ?>
    <p>No properties found.</p>
<?php endif; ?>

<!-- Popup content -->

<div class="popup" id="popup">
    <div class="popup-content">
        <div id="property-details">
        </div>
            <span class="close-btn" onclick="closePopup()">Close</span>
    </div>
</div>
<script>
    <?php include __DIR__ . '/../public/Javascript/Monopoly.js'; ?>
</script>
</body>
</html>
