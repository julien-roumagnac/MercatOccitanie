<html>
    <head>
        <title>MercatOccitanie</title>
         <link rel="icon" href="<?php echo base_url('assets/icons/soccer.png');?>">
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
                    <li class="nav-item mt-1 ">
                        <a class="nav-link" href="<?php echo base_url().'Pages/view';?>"><img width="30" height="30" src="<?php echo base_url('assets/icons/home.svg');?>"> home  </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a class="nav-link" href="<?php echo site_url().'Profil/view/'.$this->Token_model->isLog();?>"><img width="25" height="25" src="<?php echo base_url('assets/icons/avatar.svg');?>">  Profil </a>
                    </li>

                    <li class="nav-item mt-1">
                        <a class="nav-link" href="<?php echo base_url().'offres';?>"><img width="30" height="30" src="<?php echo base_url('assets/icons/offre.svg');?>">  Offres  </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a class="nav-link" href="<?php echo base_url().'offres/recherche';?>"><img width="30" height="30" src="<?php echo base_url('assets/icons/white-loupe.svg');?>">  Recherche</a>
                    </li>


                </ul>
                <form class="form-inline nav-item dropdown my-2 my-lg-0">
                    <a class="nav-link  " href="<?php echo base_url().'user/logout';?>" id="navbarDropdown" role="button"  aria-expanded="false" >
                        <img src="<?php echo base_url().'assets/icons/off.svg';?>" width="30" height="30" class="d-inline-block align-top mr-1" alt="">
                    </a>
                    
                </form>
            </div>
        </nav>






        <div class="container">
