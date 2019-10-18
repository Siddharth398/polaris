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
        $item_id = 8;
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

    $_SESSION['item_id'] = 8;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel='shortcut icon' type='image/png' href='../img/favicon.png'/>
	<title>The Walking Dead: The Definitive Series</title>
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
                <p class="special"><a class="special twd" href="../index.php"><span style="font-size: 75%" class="glyphicon glyphicon-menu-left"></span> Back to Store</a> | The Walking Dead: The Telltale Definitive Series</p>
                <div class="wrapper">
                    <img id="logo" class="img-responsive" src="The Walking Dead Definitive Series/TWD-logo.png" alt="The Walking Dead: The Definitive Series"> 
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EesXama-4Yc"></iframe>
                    </div>
                </div>
                <div>
                    <article>
                        <p class="desc">The Walking Dead: The Telltale Definitive Series contains all 4 Seasons, 400 Days, and The Walking Dead: Michonne, which includes over 50 hours of gameplay across 23 unique episodes.</p>
                    </article>
                </div>
                <div>
                    <p id="price">₹1299.99</p>
                    <?php if (isset($_SESSION['email']) && $owned == 0): ?>
                        <a href="purchase.php" type="button" class="btn btn-primary btn-block cust-small">BUY NOW</a>
                    <?php elseif ($owned == 1): ?>
                        <a href="../library.php" type="button" class="btn btn-primary btn-block cust-small">OWNED</a>
                    <?php else: ?>
                        <a href="../login.php" type="button" class="btn btn-primary btn-block cust-small">BUY NOW</a>
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
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Developer<br><p style="text-align: left">Skybound Games</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Publisher<br><p style="text-align: left">Skybound Games</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Release Date<br><p style="text-align: left">Sep 10, 2019</p></th>
                                </tr>
                                <tr>
                                    <th style="text-align: left" scope="col">Tags<br><p style="text-align: left">Single Player, Narration</p></th>
                                    <th style="text-align: left" scope="col">Rating<br><p style="text-align: left">MATURE 17+</p></th>
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
                    <p class="collapse" id="block-id">The Walking Dead: The Definitive Series<br><br>
                    <b>The Walking Dead: The Telltale Definitive Series</b> contains all 4 Seasons, 400 Days, and The Walking Dead: Michonne, which includes over 50 hours of gameplay across 23 unique episodes. With graphical enhancements, behind the scenes bonus features and faithful recreations of classic menus, this is the definitive way to experience Clementine’s journey and find out how her story ends.<br><br>
                    · Graphical Enhancements: “Graphic Black” art style brings Season 4’s enhanced visual style to all previous seasons of the acclaimed series.  Will also include full dynamic lighting to episodes that previously did not receive this upgrade.<br><br>
                    · Behind the Scenes Bonuses: Exclusive looks at the making of the game from the developers, VO artists, and other team members that brought Clementine’s story to life.  This includes over 10+ hours of developer commentary and “Return of the Walking Dead” documentary short.<br><br>
                    · Gameplay Improvements: Character performances, lip syncing, and other gameplay and UI enhancements make this the definitive Telltale’s The Walking Dead experience.<br><br>
                    · Even more digital bonuses: Music player that includes 40+ tracks across all seasons, art gallery, 3D model viewer with playable voice lines, and new 3D front end that still includes the original menus and music from all past seasons.<br><br>
                    <br class="info-br"></p>
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
                            <thead>
                                <tr>
                                    <th style="width: 50%" style="text-align: left" scope="col">Minimum</th>
                                    <th style="width: 50%" style="text-align: left" scope="col">Recommended</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">OS<br><p style="text-align: left">7 64Bit Service Pack 1</p></th>
                                    <th scope="col">OS<br><p style="text-align: left">7 64Bit Service Pack 1</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Processor<br><p style="text-align: left">Intel Core 2 Duo 2.8GHz</p></th>
                                    <th scope="col">Processor<br><p style="text-align: left">Intel Core i5-2500K</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Memory<br><p style="text-align: left">3 GB RAM</p></th>
                                    <th scope="col">Memory<br><p style="text-align: left">3 GB RAM</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Graphics<br><p style="text-align: left">Nvidia GeForce GTS 450 2GB</p></th>
                                    <th scope="col">Graphics<br><p style="text-align: left">Nvidia GeForce GTX 960</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">DirectX<br><p style="text-align: left">Version 11</p></th>
                                    <th scope="col">DirectX<br><p style="text-align: left">Version 11</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Storage<br><p style="text-align: left">15 GB available space</p></th>
                                    <th scope="col">Storage<br><p style="text-align: left">15 GB available space</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Sound Card<br><p style="text-align: left">DirectX 11 sound device</p></th>
                                    <th scope="col">Sound Card<br><p style="text-align: left">DirectX 11 sound device</p></th>
                                </tr>
                                <tr>
                                    <th colspan="2" scope="col">Languages Supported<br><p style="text-align: left">Audio: English, Subtitles: English, French, Italian, German, Spanish, Portuguese (Brazil), Russian, Simplified Chinese, Traditional Chinese</p></th>
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
                        <br><br><img class="img-responsive center-block esrb" src="The Walking Dead Definitive Series/1.png" style="width: 75%; align: center;"><br><hr style="width: 100%">
                        <p style="color: #9e9e9e">© 2018-2019 Skybound, LLC and/or its affiliates.</p><br>
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