<?php 
    session_start(); 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header("location: ../index.php");
    }

    $acc_id = $_SESSION['user_id'];
    $item_id = $_SESSION['item_id'];
    $db = mysqli_connect('192.168.1.101:3306', 'root', '', 'Polaris');
    $query = "SELECT * FROM products WHERE id=$item_id";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
    $title = $row['title'];
    $image = $row['image'];
    $price = $row['price'];
    $image = str_replace("Product/", "", $image);
    $image = str_replace(".", "-V.", $image);
?>
<!DOCTYPE Html>
<Html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel='shortcut icon' type='image/png' href='../img/favicon.png'/>
        <title><?php echo "$title" ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel='stylesheet' type='text/css' href='purchase.css'/>  
    </head>
    <body>
    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
            <?php unset($_SESSION['success']); ?>
            </div>
    <?php endif ?>
    <?php
        if (isset($_SESSION['email'])) : 
            $username = $_SESSION['disname'];
        else:
            $username = 'SIGN IN';
        endif
    ?>    
    <nav class="navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">POLARIS</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">STORE</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <?php if (isset($_SESSION['email'])) : ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($username)." " ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../library.php">LIBRARY</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../index.php?logout='1'">SIGN OUT</a></li>
                                </ul>
                            <?php
                                else: ?>
                                    <a href="../login.php"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspSIGN IN</a>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="payment-box" class="product">
            <img class="img-responsive center-block" src="<?php echo "$image" ?>">
            <div class="container">
                <br><p class='title'><?php echo "$title" ?><br><br></p>
                <p style="color: #484848;" class="title alignleft">Price</p><p class="title alignright">INR ₹<?php echo "$price" ?></p> 
            </div>
            <hr>
            <div class="container">
                <p style="font-weight: bold" class="title alignleft">Your Pay</p><p class="title alignright">INR ₹<?php echo "$price" ?></p> 
            </div>
            <hr>
            <div class="product">
                <form action="note.php" method="post" target="_self">
                <input class="btn btn-primary btn-lg" type="submit" name="pay_now" id="pay_now" Value="CHECKOUT">
                </form>
            </div>
        </div>
    </body>
</Html>