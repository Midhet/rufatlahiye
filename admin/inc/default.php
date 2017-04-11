<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>


	<!-- Begin page -->
	<div id="wrapper">

<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="/admin/"><img src="https://maker.az/templates/Default/images/logo.png" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">

                <ul class="nav navbar-nav navbar-right top-navbar">

                    <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
		    <!-- Left Sidebar Start -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <div class="clearfix"></div>
                <!--- Profile -->
                <div class="profile-info">

                    <div class="col-xs-8">
                        <div class="profile-text">Xoş gəldiniz <b> <?php echo session("user_name"); ?> !</b></div>
                        <div class="profile-buttons">

                          <a href="/admin/index.php?do=cikis_yap" title="Çıxış"><i class="fa fa-power-off text-red-1"></i></a>
                          <a href="<?php echo URL;?>" title="Sayta Keçid" target="_blank"><i class="fa fa-home text-green-1"></i></a>
                        </div>
                    </div>
                </div>
                <!--- Divider -->
                <div class="clearfix"></div>
                <hr class="divider" />
                <div class="clearfix"></div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
					   <li>
						  <a href='/admin/'><i class='icon-home-3'></i><span>Əsas Səhifə</span></a>
					   </li>
					   <li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa icon-newspaper'></i><span>Xəbərlər</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=icerik_ekle'><i class='fa icon-doc-text-inv'></i><span>Xəbər Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=icerikler'><i class='fa icon-newspaper-1'></i><span>Bütün Xəbərlər</span></a>
                               </li>
                           </ul>
						</li>
					   <li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-pencil'></i><span>Məhsullar</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=servis_ekle'><i class='fa fa-pencil-square-o'></i><span>Məhsul Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=servisler'><i class='fa fa-pencil-square'></i><span>Bütün Məhsullar</span></a>
                               </li>
                           </ul>
						</li>
						
					   <li>
						  <a href='/admin/index.php?do=aksesuar'><i class='icon-newspaper-1'></i><span>Məhsullar və Aksesurarlar</span></a>
					   </li>
					   <li>
						  <a href='/admin/index.php?do=yuklemeler'><i class="fa fa-files-o"></i><span>Məhsullar və Fayllar</span></a>
					   </li>
					   <!--li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-book'></i><span>Sabit Səhifələr</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=sayfa_ekle'><i class='fa icon-book-2'></i><span>Səhifə Yarat</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=sabit_sayfalar'><i class='fa icon-book-1'></i><span>Bütün Səhifələr</span></a>
                               </li>
                           </ul>
             </li-->
					   <!--li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-users'></i><span>İstifadəçilər</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=uye_ekle'><i class='fa icon-user-add'></i><span>İstifadəçi Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=uyeler'><i class='fa icon-users-1'></i><span>Bütün İstifadəçilər</span></a>
                               </li>
                           </ul>
              </li-->
					   <li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-sort-alpha-asc'></i><span>Digər Əlavələr</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=diger_ekle'><i class='fa icon-list-add'></i><span>Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=diger'><i class='fa  icon-list-2'></i><span>Bütün Əlavələr</span></a>
                               </li>
                           </ul>
						</li>
						<li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-sort-alpha-asc'></i><span>Bölmələr</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=kategori_ekle'><i class='fa icon-list-add'></i><span>Bölmə Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=kategoriler'><i class='fa  icon-list-2'></i><span>Bütün Bölmələr</span></a>
                               </li>
                           </ul>
						</li>
						<li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-sort-alpha-asc'></i><span>Məhsul Növləri </span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=urunler_ekle'><i class='fa icon-list-add'></i><span>Növ Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=urunler'><i class='fa  icon-list-2'></i><span>Bütün Növlər</span></a>
                               </li>
                           </ul>
						</li>
						<li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-sort-alpha-asc'></i><span>Markalar</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=marka_ekle'><i class='fa icon-list-add'></i><span>Marka Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=markalar'><i class='fa  icon-list-2'></i><span>Bütün Markalar</span></a>
                               </li>
                           </ul>
						</li>
						<li class="has_sub">
						  <a href='javascript:void(0);'><i class='fa fa-sort-alpha-asc'></i><span>Xüsusiyyətlər</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=ozellik_ekle'><i class='fa icon-list-add'></i><span>Xüsusiyyət Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=ozellikler'><i class='fa  icon-list-2'></i><span>Bütün Xüsusiyyətlər</span></a>
                               </li>
                           </ul>
						</li>
					   <li class="has_sub">
						  <a href='javascript:void(0);'><i class='glyphicon glyphicon-time'></i><span>Haqqında</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                           <ul>
                               <li><a href='/admin/index.php?do=about'><i class='fa icon-stackoverflow'></i><span>Qısa Məlumat</span></a>
                               </li>
                               <!--li><a href='/admin/index.php?do=team_add'><i class='fa icon-stackoverflow'></i><span>Komanda Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=team'><i class='fa icon-stackoverflow'></i><span>Komanda Üzvləri</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=timeline_ekle'><i class='fa icon-stackoverflow'></i><span>Timeline Əlavə Et</span></a>
                               </li>
                               <li><a href='/admin/index.php?do=timeline'><i class='fa icon-back-in-time'></i><span>Bütün Timeline`lar</span></a>
                               </li-->
                           </ul>
              </li>
					   <!--li>
						  <a href='/admin/index.php?do=aboneler'><i class='fa icon-mail'></i><span>Abunələr</span></a>
					   </li-->
					   <li>
						  <a href='/admin/index.php?do=ayarlar'><i class='fa fa-key'></i><span>Nizamlamalar</span></a>
					   </li>
					</ul>
<div class="clearfix"></div>
                </div>
            <div class="clearfix"></div>

            <div class="clearfix"></div><br><br><br>
        </div>

        </div>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">

			<?php

				$do = g("do");
				if (file_exists("inc/{$do}.php")){
					require("inc/{$do}.php");
				}else {
					require("inc/anasayfa.php");
				}

			?>



				            <!-- Footer Start -->
            <footer>
                Maker Group &copy; 2017
                <div class="footer-links pull-right">
                	<a href="http://maker.az">Texniki Dəstək</a>
                </div>
            </footer>
            <!-- Footer End -->
            </div>

        </div>
		<!-- End right content -->

	</div>
	<div id="contextMenu" class="dropdown clearfix">
		    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
		        <li><a tabindex="-1" href="javascript:;" data-priority="high"><i class="fa fa-circle-o text-red-1"></i> High Priority</a></li>
		        <li><a tabindex="-1" href="javascript:;" data-priority="medium"><i class="fa fa-circle-o text-orange-3"></i> Medium Priority</a></li>
		        <li><a tabindex="-1" href="javascript:;" data-priority="low"><i class="fa fa-circle-o text-yellow-1"></i> Low Priority</a></li>
		        <li><a tabindex="-1" href="javascript:;" data-priority="none"><i class="fa fa-circle-o text-lightblue-1"></i> None</a></li>
		    </ul>
		</div>
	<!-- End of page -->
		<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
