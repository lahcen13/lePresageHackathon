<div class="topnav" id="myTopnav">


    <a href="https://lepresage.fr/blog/">
        <p class="h3">Le Présage</p>
    </a>
    <?php if (isset($_SESSION['TABLE']) &&  $_SESSION['TABLE'] == 'investor') {
        echo '<a href="index.php?request=80"> <p class="h3">profil</p> </a>';
    }
    ?>
    <?php if (isset($_SESSION['TABLE']) &&  $_SESSION['TABLE'] == 'admin') {
        echo '<a href="index.php?request=1"> <p class="h3">Admin</p> </a>';
    }


    if (isset($_SESSION['TABLE'])) {
        echo '<a href="index.php?request=95"> <p class="h3">Cagnotte</p> </a>';
    }

    if (isset($_SESSION['TABLE'])) {
        if ($_SESSION['TABLE'] == 'admin' || $_SESSION['TABLE'] == 'investor') {
            echo '<a href="index.php?request=40"> <p class="h3">Deconnexion</p> </a>';
        }
    }
    ?>
</div>