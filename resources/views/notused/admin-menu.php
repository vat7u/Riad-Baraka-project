<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- TITLE -->
        <title>Menu Manager</title>
        <link rel="icon" href="images/24chicken-icon.png" type="image/x-icon">

        <!-- CSS -->
        <link rel="stylesheet" href="admin-menu-styles.css">

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Open+Sans:wght@700&display=swap"
    rel="stylesheet">

         <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <div class="header">
        <div class="content-margin">
            <h1>Menu Manager</h1><br>
            <a id="add-item" href="add-menu.php">+ Add item</a>
        </div>
    </div>

    <div class="cards">
        <!-- BACKEND: article will repeat depending on the # of items -->
        <!-- NOTE: if they click the card, they will be redirected
      to the specific flavor's item.php -->
        <!-- NOTE2: CSS only works if form is separated per card -->
        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>

        <form action="item.php">
            <article class="card">
                <div class="image">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="gallery" />
                </div>
                <div class="card-content">
                    <div class="flavor">Flavor</div>
                    <div class="price">₱430.00</div>
                    <input type="submit" id="select" value="Select" />
                </div>
            </article>
        </form>
    </div>
       <div class="flex-parent jc-center">
      <a href="delete.php" style="text-decoration:none;"><button id="delete">Delete</button></a> 
      <a href="update-menu.php" style="text-decoration:none;"><button id="edit">Edit</button></a>
  </div>
  </body>
</html>
