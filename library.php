<?php
    session_start(); 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header("location: /index.php");
    }

    $acc_id = $_SESSION['user_id'];

    $db = mysqli_connect('192.168.1.101:3306', 'root', '', 'Polaris');
    $query = "SELECT * FROM orders WHERE user_id='$acc_id'";
    $results = mysqli_query($db, $query);
    $item_id = array();
    $i = 0;
    #$row = mysqli_fetch_array($results);
    while($row = mysqli_fetch_array($results)):
        $item_id[$i] = $row['item_id'];
        $i++;
    endwhile;
    #print_r($item_id);
    $j = 0;
    $k = 0;
    $title = array();
    for($j = 0; $j < $i; $j++):
        $query = "SELECT * FROM products WHERE id='$item_id[$j]'";
        $game_info = mysqli_query($db, $query);
        $row = mysqli_fetch_array($game_info);
        $title[$j] = $row['image'];
    endfor;
    #print_r($title);
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
        <link rel = 'stylesheet' type = 'text/css' href = 'library.css'/>    
    </head>
    <body>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                <?php 
                    echo $_SESSION['success']; 
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
                                    <li><a href="#">LIBRARY</a></li>
                                    <li><a href="#">REDEEM CODE</a></li>
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
        <?php 
            $c = $i;
            if($i > 0):
                for($k = 0; $k < $i; $k += 3):    
        ?>
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo "$title[$k]"; ?>" class="card-img-top img-responsive center-block">
                        <p class="card-style" style="font-family: Calibri; text-align: center; background-color: #037bee; padding: 3%;">OWNED</p>
                    </div>
                    <br style="display: block; margin: 1% 0;">
                    <?php
                        $c -= 1;
                        if($c != 0):
                    ?>
                    <div class="card-body">
                        <img src="<?php $z = $k + 1; echo "$title[$z]"; ?>" class="card-img-top img-responsive center-block">
                        <p style="font-family: Calibri; text-align: center; background-color: #037bee; padding: 3%;">OWNED</p>
                    </div>
                    <br style="display: block; margin: 1% 0;">
                    <?php
                        $c -= 1;
                        endif;
                        if($c != 0):
                    ?>
                    <div class="card-body">
                        <img src="<?php $z = $k + 2; echo "$title[$z]"; ?>" class="card-img-top img-responsive center-block">
                        <p style="font-family: Calibri; text-align: center; background-color: #037bee; padding: 3%;">OWNED</p>
                    </div>
                    <br style="display: block; margin: 1% 0;">
                    <?php
                        $c -= 1; 
                        endif; ?>
                </div>
            </div>
            <br style="display: block; margin: 1% 0;">
        <?php endfor; endif; ?>
        <br style="display: block; margin: 3% 0;">                            
        <footer 
            <?php 
                if($i < 4):
                    echo "style=\"position: absolute; right: 0; left: 0; bottom: 0;\"";
                endif;
            ?>
            class="page-footer">
            <div class="container"><p style="color: white; font-family: Calibri">© 2019, Polaris, Inc. All rights reserved.<br>Developed by <a style="text-decoration: none" class="devs" href="https://www.facebook.com/smitnawar.streak">ScarletStreak</a>, <a style="text-decoration: none" class="devs" href="https://www.facebook.com/siddharth.kothari.750">SoulTrinity</a> and <a style="text-decoration: none" class="devs" href="https://www.facebook.com/profile.php?id=100009769879471">ArchAngel</a>.</p></div>
        </footer>
    </body>
</html>