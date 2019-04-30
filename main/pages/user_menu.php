    <div class="ui fixed menu">
        <div class="ui container">
            <a href="#" class="header item">
               <!-- <img class="logo" src="../images/logo.png">-->
                LAN MESSENGER APP
            </a>
            
            <div class="right menu">
                <a class="item"> 
                    <img src="../admin/pic/<?php echo $currentUserPhoto; ?>" class="ui avatar image"> status: <?php echo $currentUserOnline; ?> </a>
                <a class="item" href="../users/">Home</a>
               <div class="ui simple dropdown item">
                Settings <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="product.php">Messages</a>
                    <a class="item" href="product.php">User settings</a>
                    <!--<a class="item" href="#">Link Item</a>-->
                    <div class="divider"></div>
                    <!--<div class="header">Header Item</div>-->
<!--                    <div class="item">
                        <i class="dropdown icon"></i>
                        Sub Menu
                        <div class="menu">
                            <a class="item" href="#">Link Item</a>
                            <a class="item" href="#">Link Item</a>
                        </div>
                    </div>-->
                    <!--<a class="item" href="#">Link Item</a>-->
                </div>
            </div>

                <div class="item">
                    <a href="logout.php" class="ui red button">Logout</a>
                </div>
            </div>
        </div>
    </div>
