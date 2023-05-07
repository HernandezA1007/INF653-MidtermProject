<?php

function renderPublicHomepage($vehicles, $makes, $types, $classes) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Zippy Used Autos</title>
</head>

<body>
    <h1>Zippy Used Autos</h1>

    <form method="GET" action="index.php">
        <label for="make_id">Make:</label>
        <select name="make_id" id="make_id">
            <option value="">All Makes</option>
            <?php foreach ($makes as $make) { ?>
            <option value="<?php echo $make['id']; ?>"><?php echo $make['make']; ?> </option>
            <?php } ?>
        </select>

        <label for="type_id">Type:</label>
        <select name="type_id" id="type_id">
            <option value="">All Types</option>
            <?php foreach ($types as $type) { ?>
            <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
            <?php } ?>
        </select>

        <label for="class_id">Class:</label>
        <select name="class_id" id="class_id">
            <option value="">All Classes</option>
            <?php foreach ($classes as $class) { ?>
            <option value="<?php echo $class['id']; ?>"><?php echo $class['class']; ?></option>
            <?php } ?>
        </select>

        <label for="sort">Sort by:</label>
        <select name="sort" id="sort">
            <option value="price">Price</option>
            <option value="year">Year</option>
        </select>

        <button type="submit">Filter</button>
    </form>


    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vehicles as $vehicle) { ?>
            <tr>
                <td><?php echo $vehicle['year']; ?></td>
                <td><?php echo $vehicle['make']; ?></td>
                <td><?php echo $vehicle['type']; ?></td>
                <td><?php echo $vehicle['class']; ?></td>
                <td>$<?php echo number_format($vehicle['price'], 2); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
}