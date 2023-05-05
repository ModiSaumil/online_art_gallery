<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">

                <?php
                if (isset($_SESSION['indexname'])) {
                    ?>
                <p>       <a href="profile.php" style="color: white"><span class="fa fa-paper-plane mr-1"></span> <?php echo $_SESSION["indexname"]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!--<a href="logout.php" name="lg" style="color: white">Log out</a>--></p>
                      <?php
                } else {
                    ?>
                    <a href="mainrg.php" class="mr-2" style="color: white">Sign Up</a>
                    <a href="mainrg.php" name="lg" style="color: white">Log in</a>
                    <?php
                }
                ?>


            </div>
            <div class="col-md-6 d-flex align-items-center">

                <?php
                if (isset($_SESSION['indexname'])) {
                    ?>
                   <p>       <a href="#" style="color: white"> <?php //echo $_SESSION["indexname"]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <a href="resetpass.php" name="rp" style="color: white;text-align: right"><span class="fa fa-paper-plane mr-1"></span>Reset Password</a>
                       <a href="logout.php" name="lg" style="color: white"><span class="fa fa-paper-plane mr-1"></span>Log Out </a></p>
                       
                        <!--<br>  <a href="resetpass.php" name="rp" style="color: white">Reset Password</a></p>-->
                    <?php
              } else {
                    ?>
<!--                    <a href="mainrg.php" class="mr-2" style="color: white">Sign Up</a>
                    <a href="mainrg.php" name="lg" style="color: white">Log in</a>-->
                    <?php
                }
                ?>


            </div>

        </div>
    </div>
</div>

