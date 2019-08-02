   <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?url=dashboard">Novize Admin Paneli</a>
                </div>
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="<?php echo URL; ?>" target="_blank"><i class="fa fa-home fa-fw"></i> Siteyi Gör</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Genel</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="index.php?url=istatistik"><i class="fa fa-star-half"></i> İstatistikler</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="index.php?url=kontrol"><i class="fa fa-gamepad"></i> Kontrol</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="index.php?url=mesajlar"><i class="fa fa-envelope"></i> Mesajlar</a></li>
                </ul>





                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['admin_username']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> Profilim</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ayarlar</a>
                            </li> -->
                            <li class="divider"></li>
                            <li><a href="index.php?url=logout"><i class="fa fa-sign-out fa-fw"></i> Çıkış</a>
                            </li>
                        </ul>
                    </li>
                </ul>