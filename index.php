<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel='shortcut icon' type='image/png' href='img/favicon.png'/>
        <title>Polaris | Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel = 'stylesheet' type = 'text/css' href = 'homepage.css'/>    
    </head>
    <body>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <?php
                    unset($_SESSION['success']);
                ?>
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
                    <a class="navbar-brand" href="index.php">POLARIS</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">STORE</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <?php if (isset($_SESSION['email'])) : ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($username)." " ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="library.php">LIBRARY</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php?logout='1'">SIGN OUT</a></li>
                                </ul>
                            <?php
                                else: ?>
                                    <a href="login.php"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspSIGN IN</a>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="card-deck">
            <div class="card">
                <a class="transp" href="/product/Control.php">
                    <div class="card-body card-large">
                        <picture>
                            <source class="card-img-top img-responsive center-block" media="(min-width: 768px)" srcset="product/Control/Control-V.jpg">
                            <img src="product/Control/Control.jpg" class="card-img-top img-responsive center-block">
                        </picture>
                        <p class="card-title">Control<span class="pull-right">₹1699.99</span><br>505 Games | Remedy Entertainment Plc.</p>
                        <br style="display: block; margin: 3% 0;">
                    </div>
                </a>
                <br style="display: block; margin: 3% 0;">
            </div>
            <br style="display: block; margin: 3% 0;" class="smaller-br">
            <div class="card">
                <div class="card-body">
                    <a class="transp" href="/product/Rainbow Six Siege.php"><img src="product/R6 Siege/Siege.jpg" class="card-img-top img-responsive center-block">
                    <p class="card-title">Rainbow Six: Siege<span class="pull-right">₹999.99</span><br>Ubisoft</p>
                    <br style="display: block; margin: 3% 0;">
                </div>
                <br style="display: block; margin: 3% 0;">
                <div class="card-body">
                    <a class="transp" href="/product/Metro Exodus.php"><img src="product/Metro Exodus/Exodus.jpg" class="card-img-top img-responsive center-block">
                    <p class="card-title">Metro Exodus<span class="pull-right">₹1179.99</span><br>Deep Silver | 4A Games</p>
                    <br style="display: block; margin: 3% 0;"></a>
                </div>
            </div>
            <br style="display: block; margin: 3% 0;">
        </div>
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <a class="transp" href="/product/Cyberpunk 2077.php"><img src="product/Cyberpunk 2077/CP.png" class="card-img-top img-responsive center-block">
                    <p class="card-title">Cyberpunk 2077<span class="pull-right">₹2999.99</span><br>CD PROJEKT RED</p>
                    <br style="display: block; margin: 3% 0;"></a>
                </div>
                <br style="display: block; margin: 3% 0;">
                <div class="card-body">
                    <a class="transp" href="/product/The Outer Worlds.php"><img src="product/The Outer Worlds/OW.png" class="card-img-top img-responsive center-block">
                    <p class="card-title">The Outer Worlds<span class="pull-right">₹3199.99</span><br>Private Division | Obsidian Entertainment</p>
                    <br style="display: block; margin: 3% 0;"></a>
                </div>
            </div>
            <br style="display: block; margin: 3% 0;">
            <div class="card">
                <a class="transp" href="/product/Watch Dogs Legion.php">
                    <div class="card-body card-large">
                        <picture>
                            <source class="card-img-top img-responsive center-block" media="(min-width: 768px)" srcset="product/Watch%20Dogs%20Legion/Legion-V.jpg">
                            <img src="product/Watch Dogs Legion/Legion.jpg" class="card-img-top img-responsive center-block">
                        </picture>
                        <p class="card-title">Watch Dogs: Legion<span class="pull-right">₹3699.99</span><br>Ubisoft</p>
                        <br style="display: block; margin: 3% 0;">
                    </div>
                </a>
                <br style="display: block; margin: 3% 0;">
            </div>
            <br style="display: block; margin: 3% 0;" class="smaller-br">
        </div>
        <div class="card-deck">
            <div class="card">
                <a class="transp" href="/product/Borderlands 3.php">
                    <div class="card-body card-large">
                        <picture>
                            <source class="card-img-top img-responsive center-block" media="(min-width: 768px)" srcset="product/Borderlands%203/Borderlands3-V.png">
                            <img src="product/Borderlands 3/Borderlands3.png" class="card-img-top img-responsive center-block">
                        </picture>
                        <p class="card-title">Borderlands 3<span class="pull-right">₹3499.99</span><br>2K | Gearbox Software</p>
                        <br style="display: block; margin: 3% 0;">
                    </div>
                </a>
                <br style="display: block; margin: 3% 0;">
            </div>
            <br style="display: block; margin: 3% 0;" class="smaller-br">
            <div class="card">
                <div class="card-body">
                    <a class="transp" href="/product/The Walking Dead.php"><img src="product\The Walking Dead Definitive Series\TWD.png" class="card-img-top img-responsive center-block">
                    <p class="card-title">The Walking Dead: The Telltale Definitive Series<span class="pull-right">₹1299.99</span><br>Skybound Entertainment | Telltale Games</p>
                    <br style="display: block; margin: 3% 0;"></a>
                </div>
                <br style="display: block; margin: 3% 0;">
                <div class="card-body">
                    <a class="transp" href="/product/Bloodlines 2.php"><img src="product\Bloodlines 2\Bloodlines2.png" class="card-img-top img-responsive center-block">
                    <p class="card-title">Vampire: The Masquerade - Bloodlines 2<span class="pull-right">₹1499.99</span><br>Paradox Interactive | Hardsuit Labs Inc.</p>
                    <br style="display: block; margin: 3% 0;"></a>
                </div>
            </div>
            <br style="display: block; margin: 3% 0;">
        </div>  
        <footer class="page-footer">
                <div class="container"><p style="color: white; font-family: Calibri">© 2019, Polaris, Inc. All rights reserved.<br>Developed by <a style="text-decoration: none" class="devs" href="https://www.facebook.com/smitnawar.streak">ScarletStreak</a>, <a style="text-decoration: none" class="devs" href="https://www.facebook.com/siddharth.kothari.750">SoulTrinity</a> and <a style="text-decoration: none" class="devs" href="https://www.facebook.com/profile.php?id=100009769879471">ArchAngel</a>.</p></div>
        </footer>
    </body>
</html>