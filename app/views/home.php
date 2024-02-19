<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/ssc.png">
    <title>Welcome to Monopoly Inholland</title>
    <style>
        <?php include __DIR__ . '/../public/CSS/Style.css'; ?>
    </style>

</head>
<body>
<h1>Monopoly Inholland - Player  View</h1>
<h2>Name: <?php echo $user['userName'] ?? '[Name Unavailable]'; ?></h2>
<h2>Amount Money: $<?php echo $user['balanceAmount'] ?? '---'; ?></h2>

<?php if ($currentPlayerID == $userID): ?>
    <div id="turn-message" class="turn-message"><h3><strong>It's your turn!</strong></h3></div>
    <button class="btn-primary-finish" onclick="finishTurn()">Finish Turn</button>
<?php endif; ?>


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

<div class="popup" id="popup">
    <div class="popup-content">
        <div id="property-details">
        </div>
        <span class="close-btn" onclick="closePopup()">Close</span>
    </div>
</div>

<button class="btn-primary" onclick="trade()">Trade</button>
<button class="btn-primary" onclick="build()">Build</button>
<button class="btn-primary" onclick="sell()">Sell</button>
<button class="btn-primary" onclick="mortgage()">Mortgage</button>
<button class="btn-primary" onclick="redeem()">Redeem</button>

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
