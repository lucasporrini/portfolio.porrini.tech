<!-- Header Start -->
<header id="header" class="header">
        <div class="header__container d-flex justify-content-between align-items-center">
            
            <!-- Template Logo Start -->
            <div class="header__logo">
                <!-- Your Logo Here -->
                <img src="./public/assets/img/logo-light.svg" alt="Finley Template Logo">
            </div>
            <!-- Template Logo End -->

            <!-- Header Controls Start -->
            <div class="header__controls">
                <!-- menu trigger -->
                <div class="menu-button">
                    <a href="#0" id="menu-trigger" class="menu-trigger link-s">
                        <span class="menu-trigger__caption">
                            <em class="menu-trigger__hover">Menu</em>
                            <em class="menu-trigger__close">Close</em>
                        </span>
                        <span class="menu-trigger__icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="26px" height="26px" viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                                <path class="st0" d="M13,0c0,0,0.1,9.5,1.8,11.2S26,13,26,13s-9.5,0.1-11.2,1.8S13,26,13,26s-0.1-9.5-1.8-11.2S0,13,0,13
                                    s9.5-0.1,11.2-1.8S13,0,13,0z"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <!-- Header Controls End -->

        </div>

        <!-- Header Underlines Start -->
        <div class="header__underline underline-1"></div>
        <div class="header__underline underline-2"></div>
        <!-- Header Underlines End -->

    </header>
    <!-- Header End -->

    <!-- Navigation Start -->
    <nav id="nav" class="nav">

        <!-- Navigation Container Start -->
        <div class="nav__container">

            <!-- Content Block - Navigation Start -->
            <div class="content-block">

                <!-- Menu Start -->
                <ul class="menu">
                    <?php
                        // Check the current active page
                        // $current_page = basename($_SERVER['PHP_SELF']);
                        // print_r($current_page);

                        // $counter = 0;
                        // foreach($data['nav'] as $item) {
                        //     if($item['active'] == 1) {
                        //         echo '<li class="menu_item">
                        //             <a href="#0' . $counter . '" id="' . $item['nav_title'] . '-trigger" class="menu__link ' . $current_page == $item['nav_title'] ? 'active-link' : null . ' right text-end">
                        //                 <span class="menu__image right menu-image-' . $counter . '"></span>
                        //                 <span data-text="' . ucfirst($item['nav_title']) . '" class="menu__caption right link-xl">' . ucfirst($item['nav_title']) . '</span>
                        //             </a>
                        //             <span class="menu__divider"></span>';
                        //     }
                        // }
                    ?>
                    <!-- navigation single item -->
                    <li class="menu__item">
                        <span class="menu__number">01.</span>
                        <a href="#0" id="home-trigger" class="menu__link active-link right text-end">
                            <span class="menu__image right menu-image-1"></span>
                            <span data-text="Home" class="menu__caption right link-xl">Home</span>
                        </a>
                        <span class="menu__divider"></span>
                    </li>
                    <!-- navigation single item -->
                    <li class="menu__item">
                        <span class="menu__number">02.</span>
                        <a href="#0" id="about-trigger" class="menu__link left text-start">
                            <span class="menu__image left menu-image-2"></span>
                            <span data-text="About us" class="menu__caption link-xl">About us</span>
                        </a>
                        <span class="menu__divider"></span>
                    </li>
                    <!-- navigation single item -->
                    <li class="menu__item">
                        <span class="menu__number">03.</span>
                        <a href="#0" id="works-trigger" class="menu__link right text-end">
                            <span class="menu__image right menu-image-3"></span>
                            <span data-text="Projects" class="menu__caption right link-xl">Projects</span>
                        </a>
                        <span class="menu__divider"></span>
                    </li>
                    <!-- navigation single item -->
                    <li class="menu__item">
                        <span class="menu__number">04.</span>
                        <a href="#0" id="contact-trigger" class="menu__link left text-start">
                            <span class="menu__image left menu-image-4"></span>
                            <span data-text="Contact" class="menu__caption link-xl">Contact</span>
                        </a>
                        <span class="menu__divider"></span>
                    </li>
                </ul>
                <!-- Menu End -->

            </div>
            <!-- Content Block - Navigation End -->

            <div class="nav__footer d-md-flex text-center text-md-start align-items-md-center justify-content-md-between">
                <ul class="socials socials-text">
                    <li><a href="https://www.facebook.com/" target="_blank" class="link-s">Facebook</a></li>
                    <li><a href="https://www.instagram.com/" target="_blank" class="link-s">Instagram</a></li>
                    <li><a href="https://twitter.com/" target="_blank" class="link-s">Twitter</a></li>
                </ul>
                <p class="copyright">
                    Made with 
                    <i class="fa-solid fa-heart"></i> 
                    <a href="https://1.envato.market/EKA9WD" target="_blank" class="link-s"> by Mix_Design</a>, 2024
                </p>
            </div>

        </div>
        <!-- Navigation Container End -->

    </nav>
    <!-- Navigation End -->