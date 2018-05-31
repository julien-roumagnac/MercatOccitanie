<html>
    <head>
        <title>webProject</title>
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"  href="<?php echo site_url().'assets/css/style.css';?>">
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="<?php echo site_url().'Pages/view';?>">MercatOccitanie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url().'Pages/view';?>"><img width="7%" src="<?php echo base_url('assets/icons/home.svg');?>">  home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'Profil/view/'.$this->Token_model->isLog();?>"><img width="7%" src="<?php echo base_url('assets/icons/avatar.svg');?>">  Profil </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url().'offres';?>"><img width="7%" src="<?php echo base_url('assets/icons/offre.svg');?>">  Offres  </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url().'offres/recherche';?>"><img width="7%" src="<?php echo base_url('assets/icons/white-loupe.svg');?>">  Recherche</a>
                    </li>


                </ul>
                <form class="form-inline nav-item dropdown my-2 my-lg-0">
                    <a class="nav-link dropdown-toggle btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #9e0600 !important;">
                        Deconnexion
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url().'user/logout';?>">Cet appareil</a>
                        <a class="dropdown-item" href="#">tout les appareils</a></div>
                </form>
            </div>
        </nav>






        <div class="container">
