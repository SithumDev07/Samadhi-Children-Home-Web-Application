<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="left">

        <a href="./sample.php?overview">Overview</a>
        <a href="./sample.php?add_staff">Add Staff</a>
    </div>


    <?php

    if (isset($_GET['overview'])) {

    ?>
        <header class="mt-16">
            <h1 class="text-2xl font-semibold text-gray-700">Overview</h1>
        </header>
    <?php

    } else if (isset($_GET['add_staff'])) {


    ?>
        <header class="mt-16">
            <h1 class="text-2xl font-semibold text-gray-700">Add Staff</h1>
        </header>

    <?php

    }

    ?>

</body>

</html>