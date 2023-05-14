<?php
$menu = [
    'videos' => [
        'path' => 'index.php',
        'name' => 'VIDEOS',
    ],
    'about' => [
        'path' => 'about.php',
        'name' => 'ABOUT',
    ],
    'contact' => [
        'path' => 'contact.php',
        'name' => 'CONTACT',
    ],
];
?>
<header class="container main-header">
    <div class="logo-holder">
        <a href="<?php echo $menu['home']['path']; ?>"><img src="img/logo.png" height="40 "></a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu container">
            <?php
            foreach ($menu as $key => $menuItem) {
                echo '<li><a href="'.$menuItem['path'].'">'.$menuItem['name'].'</a></li>';
            }
            ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>