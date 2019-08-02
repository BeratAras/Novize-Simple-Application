<nav class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse" >
        <ul class="nav" id="side-menu" >
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Arama...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="<?php echo URL; ?>admin/index.php?url=dashboard"><i class="fa fa-dashboard fa-fw"></i> Genel Bakış</a>
            </li>
            <?php 
            if ($_SESSION["admin_aut"] == "admin") 
            { 
                ?>
                <li>
                    <a href="#"><i class="fa fa-dashcube fa-fw"></i> ÜYELER<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?url=tum_uyeler">Tüm Üyeler</a>
                        </li>
                        <li>
                            <a href="index.php?url=tum-erkekler">Erkekler</a>
                        </li>
                        <li>
                            <a href="index.php?url=tum-kadinlar">Kadınlar</a>
                        </li>
                        <li>
                            <a href="index.php?url=adminler">Adminler</a>
                        </li>
                    </ul>
                </li>
                <?php 
            }
            ?>
            <li>
                <a href="#"><i class="fa fa-cubes fa-fw"></i> İŞLEMLER<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?url=konular">Konular</a>
                    </li>
                    <li>
                        <a href="index.php?url=yorumlar">Yorumlar</a>
                    </li>
                     <li>
                        <a href="index.php?url=mail_gonder">E-Posta Mesaj Gönder</a>
                    </li>
                    <li>
                        <a href="index.php?url=admin_logs">Admin Log</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cubes fa-fw"></i> İÇERİK DÜZENLEME<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?url=reklam_banner">Reklam Banner</a>
                    </li>
                    <li>
                        <a href="index.php?url=anasayfa_yazilar">Anasayfa Yazılar</a>
                    </li>
                    <li>
                        <a href="index.php?url=reklam_alanlari">Reklam Alanları</a>
                    </li>
                    <li>
                        <a href="index.php?url=tuyolar">Tüyolar</a>
                    </li>
                    <li>
                        <a href="index.php?url=faydalilink">Faydalı Linkler</a>
                    </li>
                    <li>
                        <a href="index.php?url=hakkimizda">Hakkımızda</a>
                    </li>
                    <li>
                        <a href="index.php?url=sss">S.S.S</a>
                    </li>
                    <li>
                        <a href="index.php?url=sitekurallari">Site Kuralları</a>
                    </li>
                    <li>
                        <a href="index.php?url=gizlilik">Gizlilik</a>
                    </li>
                    <li>
                        <a href="index.php?url=copyazi">Copyright Yazısı</a>
                    </li>
                </ul>
            </li>
<!-- 
            <li>
                <a href="index.php?url=yorumlar"><i class="fa fa-comments fa-fw"></i> Yorumlar</a>
            </li> -->
            <?php
            if ($_SESSION["admin_aut"] == "admin") 
            { 
                ?>
                <!-- <li>
                    <a href="index.php?url=ayarlar"><i class="fa fa-sliders fa-fw"></i> Ayarlar</a>
                </li>. -->
                <?php 
            }
            ?>


        </ul>
    </div>
</nav>