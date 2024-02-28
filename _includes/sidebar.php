<body>

    <?php
    $v_active      = 'mm-active';
    $v_active_open = 'mm-active';
    $currentUrl    = $_SERVER['REQUEST_URI'];
    function isActive($url)
    {
        global $currentUrl;
        return strpos($currentUrl, $url) !== false ? 'mm-active' : '';
    }
    ?>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $wkshopBasePath ?>/dashboard.php">
                        <i class="mdi mdi-home-assistant menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-cube-outline menu-icon"></i>
                        <span class="menu-title">UI Elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a href="<?php echo $wkshopBasePath ?>/search_update.php"class="nav-link">
                        <i class="mdi mdi-database-search menu-icon"></i>
                        <span class="menu-title">Search & Update User </span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $wkshopBasePath ?>/list_of_user.php" class="nav-link">
                        <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                        <span class="menu-title">List Of User</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $wkshopBasePath ?>/create_user.php" class="nav-link">
                        <i class="mdi mdi-pen-plus menu-icon"></i>
                        <span class="menu-title">Create User </span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="pages/icons/mdi.html" class="nav-link">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-codepen menu-icon"></i>
                        <span class="menu-title">Sample Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login 2</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register 2</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="docs/documentation.html" class="nav-link">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Documentation</span></a>
                </li> -->
            </ul>
        </div>
    </nav>
    </div>