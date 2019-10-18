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
        $item_id = 4;
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

    $_SESSION['item_id'] = 4;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel='shortcut icon' type='image/png' href='../img/favicon.png'/>
	<title>Cyberpunk 2077</title>
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
                <p class="special"><a class="special cp" href="../index.php"><span style="font-size: 75%" class="glyphicon glyphicon-menu-left"></span> Back to Store</a> | Cyberpunk 2077</p>
                <div class="wrapper">
                    <img id="logo" class="img-responsive" src="Cyberpunk 2077/CP-logo.png" alt="CP"> 
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qIcTM8WXFjk"></iframe>
                    </div>
                </div>
                <div>
                    <article>
                        <p class="desc">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.</p>
                    </article>
                </div>
                <div>
                    <p id="price">₹2999.99</p>
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
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Developer<br><p style="text-align: left">CD PROJEKT RED</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Publisher<br><p style="text-align: left">CD PROJEKT RED</p></th>
                                    <th style="width: 33.33%" style="text-align: left" scope="col">Release Date<br><p style="text-align: left">Apr 16, 2020</p></th>
                                </tr>
                                <tr>
                                    <th style="text-align: left" scope="col">Tags<br><p style="text-align: left">RPG, Single Player</p></th>
                                    <th style="text-align: left" scope="col">Rating<br><p style="text-align: left">Rating Pending</p></th>
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
                    <p class="collapse" id="block-id">THE REAL YOU IS NOT ENOUGH<br><br>
                    Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality. You can customize your character’s cyberware, skillset and playstyle, and explore a vast city where the choices you make shape the story and the world around you.<br><br>
                    <b>PLAY AS A MERCENARY OUTLAW</b><br>
                    Become a cyberpunk, an urban mercenary equipped with cybernetic enhancements and build your legend on the streets of Night City.<br><br>
                    <b>LIVE IN THE CITY OF THE FUTURE</b><br>
                    Enter the massive open world of Night City, a place that sets new standards in terms of visuals, complexity and depth.<br><br>
                    <b>STEAL THE IMPLANT THAT GRANTS ETERNAL LIFE</b><br>
                    Take the riskiest job of your life and go after a prototype implant that is the key to immortality.<br><br>
                    <img class="img-responsive" src="Cyberpunk 2077/1.jpg"><br>
                    <img class="img-responsive" src="Cyberpunk 2077/2.jpg"><br>
                    <img class="img-responsive" src="Cyberpunk 2077/3.jpg"><br>
                    <img class="img-responsive" src="Cyberpunk 2077/4.jpg"><br>
                    <img class="img-responsive" src="Cyberpunk 2077/5.jpg"><br>
                    <img class="img-responsive" src="Cyberpunk 2077/6.jpg"><br>
                    <img class="img-responsive" src="Cyberpunk 2077/7.jpg"><br class="info-br"></p>
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
                                    <th colspan="2" scope="col">Languages Supported<br><p style="text-align: left">[VOICE OVER]: English, French, German, Italian, Spanish, Japanese, Polish, Brazilian Portuguese, Russian, Simplified Chinese, [TEXT ONLY]: Spanish-Mexican, Thai, Czech, Hungarian, Traditional Chinese, Arabic, Korean, Turkish</p></th>
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
                        <br><br><img class="img-responsive center-block esrb" src="Cyberpunk 2077/8.png" style="width: 75%; align: center;"><br><hr style="width: 100%">
                        <p style="color: #9e9e9e">CD PROJEKT®, Cyberpunk 2077® are registered trademarks of CD PROJEKT S.A.</p><br>
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