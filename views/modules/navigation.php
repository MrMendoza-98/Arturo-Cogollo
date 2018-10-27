        <style>
            .s-header{
                display: block;
            }
            .title{
                font-size: 14px;
                letter-spacing: .5px;
            }
            .subtitle{
                font-size: 14px;
                letter-spacing: .5px;
            }
        </style>
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="inicio">
              <h3 class="tittle">arturo cogollo</h3>
              <p class="subtittle">arquitectura</p>
            </a>
        </div>
        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <!-- <h3>Menu</h3> -->

                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll title"  href="inicio" title="home">Home</a></li>
                    <li><a class="smoothscroll title"  href="categories" title="about">Categories</a></li>
                    <ul>
                        <li><a class="subtitle" href="all">All</a></li>
                        <?php 
                            $menu = new GestorCategoria();
                            $menu -> menu();
                        ?>
                    </ul>
                    <li><a class="smoothscroll title"  href="contact" title="contact">Contact</a></li>
                </ul>

                <!-- <ul class="header-nav__social">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul> -->

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->
