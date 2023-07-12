<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- TITLE -->
        <title>Add New Menu Item</title>
        <link rel="icon" href="images/24chicken-icon.png" type="image/x-icon">

        <!-- CSS -->
        <link rel="stylesheet" href="add-menu-styles.css">

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Open+Sans:wght@700&display=swap"
    rel="stylesheet">

         <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <div class="header">
        <div class="content-margin">
            <h1>Add New Menu Item</h1>
            <p>Description </p>
        </div>
    </div>

    <!-- CONTENT - Item Information-->
    <div class="row">
        <div class="column1">
            <form method="POST" action="update-menu.php">
                <!-- BACKEND: change values depending on user -->
                <h3 id="heading">Item Information</h3>

                <div class="form-half">
                    <div class="form-left">
                        <label for="item-name">Item Name</label><br>
                        <input type="text" name="item-name" value="Flavor" required><br>
                    </div>
                    <div class="form-right">
                        <label for="lname">Price</label><br>
                        <input type="text" name="price" value="430" required><br>
                    </div>
                </div>
                <br>

                <label for="description">Description</label><br>
                <input type="textarea" name="description" value="textarea" required><br>
                <br>

                <div class="form-half">
                    <div class="form-left">
                        <label for="image">Image</label><br>
                        <input type="img" name="image" value="Upload new image" required><br>
                    </div>
                <input type="submit" name="save" value="Save">
            </form>
        </div>

        <div class="column-mid"></div> <!-- column separator -->
        <div class="column2"></div> <!-- branch image -->
    </div>
</body>
</html>
