<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="col">
            <?php include("headerAdmin.php");?>
        </div>
        <div class="row row-cols-2">
            <div class="col-2">
                <?php include("slideMenu.php");?>
            </div>
            <div class="col-10">
                <?php include("showTable.php") ?>
                <div class="row row-cols-2">
                    <div class="col-6">
                        <br><br>
                        <?php ?>
                    </div>
                    <div class="col-6">

                    </div>
                </div>
            </div>
        </div>
        <?php include("footerAdmin.php");?>

    </div>
</body>

</html>