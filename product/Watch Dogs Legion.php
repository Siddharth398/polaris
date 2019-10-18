<?php 
    session_start(); 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header("location: ../index.php");
    }

    $owned = 0;
    if(isset($_SESSION['email'])):
        $acc_id = $_SESSION['user_id'];
        $item_id = 6;
        $db = mysqli_connect('192.168.1.101:3306', 'root', '', 'Polaris');
        $query = "SELECT * FROM orders WHERE user_id='$acc_id' and item_id='$item_id'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_array($results);
        if($row['owned'] == 1):
            $owned = 1;
        else:
            $owned = 0;
        endif;
    endif;

    $_SESSION['item_id'] = 6;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel='shortcut icon' type='image/png' href='../img/favicon.png'/>
	<title>Watch Dogs: Legion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8d72617c90.js" crossorigin="anonymous"></script>
    <link rel = 'stylesheet' type = 'text/css' href = 'product.css'/>   
</head>
    <body>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                <?php
                    unset($_SESSION['success']);
                ?>
                </h3>
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
        <div class="store-desk">                 
            <div class="product">
                <p class="special"><a class="special wdl" href="../index.php"><span style="font-size: 75%" class="glyphicon glyphicon-menu-left"></span> Back to Store</a> | Watch Dogs: Legion</p>
                <div class="wrapper">
                    <img id="logo" class="img-responsive" src="Watch Dogs Legion/WDLegion-logo.png" alt="Watch Dogs: Legion"> 
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/KbokXaPTk38"></iframe>
                    </div>
                </div>
                <div>
                    <article>
                        <p class="desc">In Watch Dogs Legion, you get to build a resistance from virtually anyone you see as you hack, infiltrate, and fight to take back a near-future London that is facing its downfall. Welcome to the Resistance.</p>
                    </article>
                </div>
                <div>
                    <p id="price">₹3699.99</p>
                    <?php if (isset($_SESSION['email']) && $owned == 0): ?>
                        <a href="purchase.php" type="button" class="btn btn-primary btn-block cust-small">PRE-PURCHASE</a>
                    <?php elseif ($owned == 1): ?>
                        <a href="../library.php" type="button" class="btn btn-primary btn-block cust-small">OWNED</a>
                    <?php else: ?>
                        <a href="../login.php" type="button" class="btn btn-primary btn-block cust-small">PRE-PURCHASE</a>
                    <?php endif; ?>
                    <br>
                    <hr class="about-hr">
                    <br>
                </div>
                <div class="about"><p class="left-desc">About Game</p></div>
                <div class="card">
                    <div class="card-body john-cena"> 
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Developer<br><p style="text-align: left">Ubisoft Toronto</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Publisher<br><p style="text-align: left">Ubisoft</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Release Date<br><p style="text-align: left">Early 2020</p></th>
                                </tr>
                                <tr>
                                    <th style="text-align: left" scope="col">Tags<br><p style="text-align: left">Action, Multiplayer, Open World</p></th>
                                    <th style="text-align: left" scope="col">Rating<br><p style="text-align: left">RATING PENDING</p></th>
                                    <th style="text-align: left" scope="col">Platform<br><p style="text-align: left"><i class="fab fa-windows"></i></p></th>
                                </tr>
                            </tbody>
                            <br class="table-br">
                        </table> 
                        <br class="table-br" style="margin: -5% 0">
                    </div>
                    <br class="table-br">
                </div>
                <div id="info" class="info-wide">
                    <p class="collapse" id="block-id">Watch Dogs: Legion<br><br>
                    In Watch Dogs Legion, you get to build a resistance from virtually anyone you see as you hack, infiltrate, and fight to take back a near-future London that is facing its downfall. Welcome to the Resistance.<br><br>
                    <img class="img-responsive" src="Watch Dogs Legion/1.jpg"><br>
                    <img class="img-responsive" src="Watch Dogs Legion/2.jpg"><br>
                    <img class="img-responsive" src="Watch Dogs Legion/3.jpg"><br>
                    <img class="img-responsive" src="Watch Dogs Legion/4.jpg"><br>
                    <img class="img-responsive" src="Watch Dogs Legion/5.jpg"><br>
                    <img class="img-responsive" src="Watch Dogs Legion/6.jpg"><br class="info-br"></p>
                </div>  
                <div>
                    <a href="#block-id"
                            class="btn btn-primary btn-block show-wide"
                                data-toggle="collapse"
                                aria-expanded="false"
                                aria-controls="block-id">
                
                                <span id="show" class="collapsed">SHOW MORE</span>
                                <span id="show" class="expanded">SHOW LESS</span>
                    </a>
                </div>
                <br><br>
                <div class="specs">
                    <p class="about_header" style="text-align: left">Specifications</p>
                </div>
                <div class="card">
                    <div class="card-body"> 
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th colspan="2" scope="col">Languages Supported<br><p style="text-align: left">Audio: English, French, Italian, German, Spanish (Spain), Russian, Japanese, Text: Spanish (Latam), Dutch, Polish, Korean, Traditional Chinese, Simplified Chinese, Arabic</p></th>
                                </tr>
                                <tr>
                                    <th colspan="2" scope="col">Disclaimer<br><p style="text-align: left">This game requires Ubisoft account linking to play. This purchase is region-locked to account country. This game will be language-locked for purchases made from Russia, Ukraine and CIS countries. Uplay is required to play.</p></th>
                                </tr>
                            </tbody>
                            <br class="table-br">
                        </table> 
                        <br class="table-br" style="margin: -5% 0">
                    </div>
                    <br class="table-br">
                    <br class="table-br">
                </div>
                <div class="card">
                    <div class="card-body">
                        <br><br><img class="img-responsive center-block esrb" src="Watch Dogs Legion/7.png" style="width: 75%; align: center;"><br><hr style="width: 100%">
                        <p style="color: #9e9e9e">© 2019 Ubisoft Entertainment. All Rights Reserved.</p><br>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <footer class="page-footer">
                <div class="container"><p style="color: white; font-family: Calibri">© 2019, Polaris, Inc. All rights reserved.<br>Developed by <a style="text-decoration: none" class="devs" href="https://www.facebook.com/smitnawar.streak">ScarletStreak</a>, <a style="text-decoration: none" class="devs" href="https://www.facebook.com/siddharth.kothari.750">SoulTrinity</a> and <a style="text-decoration: none" class="devs" href="https://www.facebook.com/profile.php?id=100009769879471">ArchAngel</a>.</p></div>
        </footer>
    </body>
</html>