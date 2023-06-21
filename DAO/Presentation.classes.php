<?php
class Utilitaires
{

    public function GetHeader()
    {
?>

        <body class="g-0">
            <nav class="navbar navbar-expand-lg navbar_navbar-expand-lg p-0  g-0 position-fixed z-2 w-100 top-0 ">
                <div class="container-fluid g-0 d-flex align-items-center  navstyle">
                    <img src="../assets/images_the_district/the_district_brand/instagram_profile_image-removebg-preview.png" alt="Logo" width="70" height="25%" class="d-inline-block align-text-top ">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light" aria-current="page" href="#">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light" href="categories.php">Catégories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light " href="#">Plats</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active fw-bold text-light" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid g-0 contain">
                <div class="image-container d-none d-md-block">
                    <img class="image" src="assets\images_the_district\nouritture.jpg" alt="Your Image " id="imagetop">
                    <form class="form-inline">
                        <div class="input-group d-none d-sm-block">
                            <input type="search" class="form-control" placeholder="Rechercher Un plat" id="ss">
                            <div>
                                <button class=" btn-primary bg-danger" type="submit" id="se">
                                    <i class="fa fa-search"></i> Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
    }

    public function GetFooter()
    {
        ?>

            <hr class="hrf">
            <footer class="foot bg-light d-flex justify-content-start ">
                <ul class="d-flex flex-row w-50 justify-content-between m-0 align-items-center g-0">
                    <li><img src="assets\images_the_district\the_district_brand\logo facebbok.png" alt="logofacebook" id="reseaux"></li>
                    <li><img src="assets\images_the_district\the_district_brand\logo youtube.png" alt="logoyoutube" id="reseaux"></li>
                    <li><img src="assets\images_the_district\the_district_brand\insta logo.png" alt="logoinsta" id="reseaux"></li>

                </ul>
                <ul class="d-flex flex-row w-25 justify-content-end m-0 align-items-end g-0">
                    <div class="d-flex justify-content-end">
                        <li class="d-flex flex-row w-50 justify-content-between">Mentions Légale</li>
                        <li>Politique de confidentialite</li>
                </ul>
                </div>
            </footer>
    <?php
    }
}
