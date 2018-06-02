


<div class="container card jprofil  text-center my-5">
    <div class="row card-header ">
        <div class="col-md-2 col-sm-12"><h1><span class="badge badge-info"><?=$title?></span></h1> </div>
        <div class="col-md-10 col-sm-12 "> <h2 class="cardtitle"><?php echo $joueur['nom'].' '.$joueur['prenom'];?></h2>  </div>

    </div>
    <div class="container">
        <div  class="row my-2 mx-1">

            <div class="col-md-3 col-sm-3 col-xs-6 card"><p> <h5>Poste</h5> <br><?php echo $joueur['poste'];?></p></div>
            <div class="col-md-3 col-sm-3 col-xs-6 card "><p> <h5>ville </h5><br> <?php echo $joueur['ville'];?> </p> </div>
            <div class="col-md-3 col-sm-3 col-xs-6 card"><p> <h5>telephone</h5> <br> <?php echo $joueur['num_phone'];?></p>   </div>
            <div class="col-md-3 col-sm-3 col-xs-6 card"><p> <h5>mail</h5> <br> <?php echo $joueur['mail'];?></p>   </div>
        </div>
        <div  class="row my-2 mx-1">

            <div class="col-md-6 col-sm-6 col-xs-6 card mt-1 py-1" >
                <h5>Niveau : <?php echo $joueur['division'];?> </h5>
                <button type="button" class="btn btn-default dropdown-toggle scrollable-menu display:block mx-auto" data-toggle="dropdown">Palmarès <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <?php foreach ($titres as $trophy):?>
                        <li class="list-group-item"><?php echo $trophy['titre'];?></li>
                    <?php endforeach;?>
                </ul> </div>

            <div class="col-md-6 col-sm-6 col-xs-6 card mt-1 py-1">
                <h5>club actuel:  <?php echo $joueur['club'];?></h5>
                <button type="button" class="btn btn-default dropdown-toggle scrollable-menu display:block mx-auto" data-toggle="dropdown">Anciens clubs <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <?php foreach ($clubs as $club):?>
                        <li class="list-group-item"><?php echo $club['club'];?></li>
                    <?php endforeach;?>
                </ul>

            </div>
        </div>
        <div class=" my-2 mx-1 ">
            <div class="text-center card">
                <h3> "Biographie"</h3>
                <p ><?php echo $joueur['bio'];?></p>
            </div>

        </div>
        <div>
            <div id="carouselExampleIndicators" class="carousel slide mt-2" data-interval="false" data-ride="carousel" style ="color:#1ab188">
                <ol class="carousel-indicators">
                    <?php $cpt =0 ; foreach ($videos as $video) : ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $cpt ;?>" class="<?php if($cpt==0){echo 'active';}?>"></li>
                        <?php $cpt = $cpt+1; endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php $cpt =0 ; foreach ($videos as $video) : ?>
                        <div class="carousel-item <?php if($cpt==0){echo 'active';}?>">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video['id_lien'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <?php $cpt = $cpt+1; endforeach; ?>

                </div>
                <?php if($cpt>0) :?>
                <a class="carousel-control-prev style ="  href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class=""  aria-hidden="true"><img src="<?php echo site_url('assets/icons/left-arrow.svg');?>" width="25%"></span>
                    <span class="sr-only  ">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class=""  aria-hidden="true"><img src="<?php echo site_url('assets/icons/right-arrow.svg');?>" width="25%"></span>
                    <span class="sr-only">Next</span>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>




</div>

<?php if($viewid==$this->Token_model->isLog()) :?>
    <div class="useractions  card mb-5 ">

        <div class="card-header "><h3 class="cardtitle"> Modifications profil
                <button type="button" class="btn  float-right" style="background-color: #ff3838 !important;" data-toggle="modal" data-target="#exampleModal">
                    Supprimer profil
                </button>
            </h3>
        </div>

        <div class="row my-2 ">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"> <img src="<?php echo site_url('assets/icons/club-logo.svg');?>" width="30px" height="30px"> Ajout ancien Club</h5>
                        <?php echo form_open(site_url().'profil/ajout_old_club'); ?>
                        <input type="text" class="form-control" name="club" placeholder="FC polytech">
                        <button type="submit" class="btn mt-1" >envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><img src="<?php echo site_url('assets/icons/trophy.svg');?>" width="30px" height="30px">Ajout Titre</h5>
                        <?php echo form_open(site_url().'profil/ajout_titre'); ?>
                        <input type="text" class="form-control" name="titre" placeholder="Champion de l'herault">
                        <button type="submit" class="btn mt-1" >envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><img src="<?php echo site_url('assets/icons/bio.svg');?>" width="30px" height="30px"> Modif biographie</h5>
                        <?php echo form_open(site_url().'profil/update'); ?>
                        <input type="text" class="form-control" name="bio" placeholder="Racontez votre histoire ">
                        <button type="submit" class="btn  mt-1" >envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><img src="<?php echo site_url('assets/icons/youtube-logo.svg');?>" width="30px" height="30px"> Ajout Vidéo</h5>
                        <?php echo form_open(site_url().'profil/ajout_video'); ?>
                        <input type="text" class="form-control" name="video" placeholder="Entrez le lien youtube ici">
                        <button type="submit" class="btn  mt-1" >envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression Compte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Vous allez supprimer definitivement votre compte ette action n'est pas reversible. Si vous ne voulez pas cela appuyez sur close.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-dismiss="modal">Close</button>
                    <a href="<?php echo site_url().'profil/delete';?>"><button type="button" class="btn " style="background-color: #ff3838 !important;">Supprimer definitivement</button></a>
                </div>
            </div>
        </div>
    </div>
<?php endif?>


