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
<a href="/homepage"><img class="mb-4" src="/images/ssc.png" alt="Website Logo" width="350" height="150"></a>
    <h1>Monopoly Inholland - Admin Portal</h1>
<button class="btn-primary" onclick="window.location.href='/adduser'">Add User Page</button>
</br>

<h2>List of Users and Balances</h2>

<table>
    <thead>
    <tr>
        <th>User Name</th>
        <th>Balance Amount</th>
        <th>Update Balance</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['userName'] ?? '[User Name Unavailable]'; ?></td>
            <td>$<?php echo $user['balanceAmount'] ?? '---'; ?></td>
            <td>
                <form class="updateBalanceForm" data-userid="<?php echo $user['userID']; ?>">
                    <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                    <input type="number" name="newBalance" value="<?php echo $user['balanceAmount']; ?>">
                    <button type="submit">Update</button>
                </form>
                <div class="updateMessage" id="updateMessage-<?php echo $user['userID']; ?>"></div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

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