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
        $item_id = 7;
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

    $_SESSION['item_id'] = 7;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel='shortcut icon' type='image/png' href='../img/favicon.png'/>
	<title>Borderlands 3</title>
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
                <p class="special"><a class="special b3" href="../index.php"><span style="font-size: 75%" class="glyphicon glyphicon-menu-left"></span> Back to Store</a> | Borderlands 3</p>
                <div class="wrapper">
                    <img id="logo" class="img-responsive" src="Borderlands 3/B3-logo.png" alt="Borderlands 3"> 
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Av5Eyx3bGtM"></iframe>
                    </div>
                </div>
                <div>
                    <article>
                        <p class="desc">The original shooter-looter returns, packing bazillions of guns and a mayhem-fueled adventure! Blast through new worlds & enemies and save your home from the most ruthless cult leaders in the galaxy.</p>
                    </article>
                </div>
                <div>
                    <p id="price">₹3499.99</p>
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
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Developer<br><p style="text-align: left">Gearbox Software</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Publisher<br><p style="text-align: left">2K</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Release Date<br><p style="text-align: left">Sep 13, 2019</p></th>
                                </tr>
                                <tr>
                                    <th style="text-align: left" scope="col">Tags<br><p style="text-align: left">Co-op, RPG, FPS</p></th>
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
                    <p class="collapse" id="block-id">MAYHEM IS COMING<br><br>
                    The original shooter-looter returns, packing bazillions of guns and a mayhem-fueled adventure! Blast through new worlds and enemies as one of four new Vault Hunters. Play solo or with friends to take on insane enemies, score loads of loot and save your home from the most ruthless cult leaders in the galaxy.<br><br>
                    <b>A MAYHEM-FUELED THRILL RIDE</b><br>
                    Stop the fanatical Calypso Twins from uniting the bandit clans and claiming the galaxy’s ultimate power.<br><br>
                    <b>YOUR VAULT HUNTER, YOUR PLAYSTYLE</b><br>
                    Become one of 4 new Vault Hunters, each with deep skill trees, abilities and customization.<br><br>
                    <b>LOCK, LOAD, AND LOOT</b><br>
                    With bazillions of guns and gadgets, every fight is an opportunity to score new gear.<br><br>
                    <b>NEW BORDERLANDS</b><br>
                    Discover new worlds beyond Pandora, each with unique environments and enemies.<br><br>
                    <b>QUICK & SEAMLESS CO-OP ACTION</b><br>
                    Play with anyone at any time with online co-op, regardless of your level or mission progress.<br><br>
                    <img class="img-responsive" src="Borderlands 3/1.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/2.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/3.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/4.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/5.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/6.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/7.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/8.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/9.jpg"><br>
                    <img class="img-responsive" src="Borderlands 3/10.jpg"><br class="info-br"></p>
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
                                    <th scope="col">OS<br><p style="text-align: left">Windows 7/10 (latest service pack)</p></th>
                                    <th scope="col">OS<br><p style="text-align: left">Windows 7/10 (latest service pack)</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Processor<br><p style="text-align: left">AMD FX-8350 (Intel i5-3570)</p></th>
                                    <th scope="col">Processor<br><p style="text-align: left">AMD Ryzen™ 5 2600 (Intel i7-4770)</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">RAM<br><p style="text-align: left">6 GB</p></th>
                                    <th scope="col">RAM<br><p style="text-align: left">16 GB</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">Graphics Card<br><p style="text-align: left">AMD Radeon™ HD 7970 (NVIDIA GeForce GTX 680 2GB)</p></th>
                                    <th scope="col">Graphics Card<br><p style="text-align: left">AMD Radeon™ RX 590 (NVIDIA GeForce GTX 1060 6GB)</p></th>
                                </tr>
                                <tr>
                                    <th scope="col">HDD<br><p style="text-align: left">75 GB</p></th>
                                    <th scope="col">HDD<br><p style="text-align: left">75 GB</p></th>
                                </tr>
                                <tr>
                                    <th colspan="2" scope="col">Languages Supported<br><p style="text-align: left">Audio: English, French, Italian, German, Spanish, Japanese, Korean, Simplified Chinese - Text: Russian, Portuguese (Brazilian)</p></th>
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
                        <br><br><img class="img-responsive center-block esrb" src="Borderlands 3/11.jpg" style="width: 75%; align: center;"><br><hr style="width: 100%">
                        <p style="color: #9e9e9e">© 2019 Gearbox. Published and distributed by 2K.</p><br>
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