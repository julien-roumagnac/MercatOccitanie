


<div class="container card jprofil  text-center my-5">
    <div class="row card-header ">
        <div class="col-md-2 col-sm-12"><h1><span class="badge badge-info"><?=$title?></span></h1> </div>
        <div class="col-md-10 col-sm-12 "> <h2 class="cardtitle"><?php echo $club['libelle'];?></h2>  </div>

    </div>
    <div class="container">
        <div  class="row my-2 mx-1">

            <div class="col-md-3 col-sm-3 col-xs-6 card"><p> <h5>Ville </h5> <br><?php echo $club['ville'];?></p></div>
            <div class="col-md-3 col-sm-3 col-xs-6 card "><p> <h5>Siege social </h5><br> <?php echo $club['adresse'];?> <?php echo $club['ville'];?> </p> </div>
            <div class="col-md-3 col-sm-3 col-xs-6 card"><p> <h5>Contact telephone</h5> <br> <?php echo $club['contact'];?></p>   </div>
            <div class="col-md-3 col-sm-3 col-xs-6 card"><p> <h5>mail</h5> <br> <?php echo $club['mail'];?></p>   </div>
        </div>
        <div  class="row my-2 mx-1">

            <div class="col-md-3 col-sm-3 col-xs-3 card mt-1 py-1" >
                <h5>Niveau equipe Principale: <?php echo $club['d1'];?> </h5>
                 </div>
            <div class="col-md-3 col-sm-3 col-xs-3 card mt-1 py-1" >
                <h5>Niveau equipe secondaire: <?php echo $club['d2'];?> </h5>
                 </div>

            <div class="col-md-6 col-sm-6 col-xs-6 card mt-1 py-1">
                <h5>Titres du club  </h5>
                <button type="button" class="btn btn-default dropdown-toggle scrollable-menu display:block mx-auto" data-toggle="dropdown">Palmares <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <?php foreach ($titres as $trophy):?>
                        <li class="list-group-item"><?php echo $trophy['titre'];?></li>
                    <?php endforeach;?>
                </ul>

            </div>
        </div>
        <div class=" my-2 mx-1 ">
            <div class="text-center card">
                <h3> Description de l'esprit du club </h3>
                <p ><?php echo $club['description'];?></p>
            </div>

        </div>


    </div>




</div>

<?php if($viewid==$this->Token_model->isLog()) :?>
    <div class="useractions  card mb-5 ">
        <div class="card-header"><h3 class="cardtitle"> Modifications profil</h3> </div>
        <div class="row my-2 ">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"> <img src="<?php echo site_url('assets/icons/club-logo.svg');?>" width="20%"> Ajout ancien Club</h5>
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
                        <h5 class="card-title"><img src="<?php echo site_url('assets/icons/trophy.svg');?>" width="20%">Ajout Titre</h5>
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
                        <h5 class="card-title"><img src="<?php echo site_url('assets/icons/bio.svg');?>" width="20%"> Modif biographie</h5>
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
                        <h5 class="card-title"><img src="<?php echo site_url('assets/icons/youtube-logo.svg');?>" width="20%"> Ajout Vidéo</h5>
                        <?php echo form_open(site_url().'profil/ajout_video'); ?>
                        <input type="text" class="form-control" name="video" placeholder="Entrez le lien youtube ici">
                        <button type="submit" class="btn  mt-1" >envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php endif?>


