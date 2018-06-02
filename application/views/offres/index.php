

<div class="text-center">

<button type="button"  onclick="update(this)" class="offrebtn my-1" id="1">Offres les plus récentes</button>
<button type="button"  onclick="update(this)" class="offrebtn my-1" id="2">Dernieres offres de joueurs </button>
<button type="button"  onclick="update(this)" class="offrebtn my-1" id="3">Dernieres offres de Clubs</button>
    <br>
    <!-- Button trigger modal -->
    <button type="button" style="background-color:#d0b83b !important" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal">
        Ajoutez Offre
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header card-header text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Creer Offre</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors();
                    echo form_open('offres/create');?>
                    <div class="card my-3 ">

                        <div class="container my-1 mx-auto">
                            <div class="form-group ">
                                <label for="poste">Poste </label>
                                <select multiple name="poste_id" class="form-control" >
                                    <?php foreach ($postes as $poste):?>
                                        <option value="<?php echo $poste['poste_id'] ;?>" ><?php echo $poste['poste'] ;?></option>
                                    <?php endforeach;?></select>
                            </div>
                            <div class="form-group">
                                <label for="niveau">Niveau </label>
                                <select multiple name="niveau_id" class="form-control" >
                                    <?php foreach ($niveaux as $niveau):?>
                                        <option value="<?php echo $niveau['niveau_id'] ;?>" ><?php echo $niveau['division'] ;?></option>
                                    <?php endforeach;?></select>
                            </div>
                            <div class="form-group">
                                <label for="poste">Description </label>
                                <input type="text" class="form-control" name="desc" placeholder="Attiré par le jeu offensif et collectif">
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn " style ="background-color:#9e0e12 !important" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn ">ajout</button>
                        </div>
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container " id="a" >
    <div class="container card mt-3 " >


        <ul class="list-group list-group-flush py-3">


            <?php foreach($lastoffres as $offre) : ?>
                <li class="list-group-item">
                    <div class="card mb-3">
                        <div class="card-header cardtitle row text-center" style="margin-left: 0px ; margin-right: 0px">

                            <div class="col-md-4 col-sm-6">Poste : <h6><?php echo $offre['poste']; ?></h6></div>
                            <div class="col-md-4 col-sm-6">niveau : <h6><?php echo $offre['division'];  ?></h6></div>
                            <div class="col-md-4 col-sm-10">
                                <?php
                                if ($offre['id_user']===$user) {
                                    echo  '<a class="" href="'.base_url('/offres/delete/'.$offre['offres_id']).'" >
                                        <img class="" width="25px" height="25px"  src="'.site_url('assets/icons/cancel2.svg').'"></a>';
                                } else {
                                    echo 'En savoir plus sur l\'auteur  <a href="'.site_url().'profil/view/'.$offre['id_user'].'\"  >
                                    <img  width="25px" height="25px" src="'.site_url('assets/icons/navarrow.svg').'"> </a>';

                                }
                                ?>


                            </div>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">  <?php echo word_limiter($offre['description'],20); ?> </p>
                            <a href="<?php echo site_url('/offres/view/'.$offre['offres_id']) ;?>" class="btn">plus</a>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>

    </div> </div>

<div class="container" id="b">
    <div class="container card mt-3" >


        <ul class="list-group list-group-flush">


            <?php foreach($offresjoueurs as $offre) : ?>
                <li class="list-group-item">
                    <div class="card mb-3">
                        <div class="card-header cardtitle row text-center" style="margin-left: 0px ; margin-right: 0px">

                            <div class="col-md-4 col-sm-6">Poste : <h6><?php echo $offre['poste']; ?></h6></div>
                            <div class="col-md-4 col-sm-6">niveau : <h6><?php echo $offre['division'];  ?></h6></div>
                            <div class="col-md-4 col-sm-10">
                                <?php
                                if ($offre['id_user']===$user) {
                                    echo  '<a class="" href="'.base_url('/offres/delete/'.$offre['offres_id']).'" >
                                        <img class="" width="25px" height="25px"  src="'.site_url('assets/icons/cancel2.svg').'"></a>';
                                } else {
                                    echo 'En savoir plus sur l\'auteur  <a href="'.site_url().'profil/view/'.$offre['id_user'].'\"  >
                                    <img  width="25px" height="25px" src="'.site_url('assets/icons/navarrow.svg').'"> </a>';

                                }
                                ?>


                            </div>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">  <?php echo word_limiter($offre['description'],20); ?> </p>
                            <a href="<?php echo site_url('/offres/view/'.$offre['offres_id']) ;?>" class="btn">plus</a>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>

    </div>
</div>

    <div class="container" id="c">
        <div class="container card mt-3" >


            <ul class="list-group list-group-flush">


                <?php foreach($offresclubs as $offre) : ?>
                    <li class="list-group-item">
                        <div class="card mb-3">
                            <div class="card-header cardtitle row text-center" style="margin-left: 0px ; margin-right: 0px">

                                <div class="col-md-4 col-sm-6">Poste : <h6><?php echo $offre['poste']; ?></h6></div>
                                <div class="col-md-4 col-sm-6">niveau : <h6><?php echo $offre['division'];  ?></h6></div>
                                <div class="col-md-4 col-sm-10">
                                    <?php
                                    if ($offre['id_user']===$user) {
                                        echo  '<a class="" href="'.base_url('/offres/delete/'.$offre['offres_id']).'" >
                                        <img class="" width="25px" height="25px"  src="'.site_url('assets/icons/cancel2.svg').'"></a>';
                                    } else {
                                        echo 'En savoir plus sur l\'auteur  <a href="'.site_url().'profil/view/'.$offre['id_user'].'\"  >
                                    <img  width="25px" height="25px" src="'.site_url('assets/icons/navarrow.svg').'"> </a>';

                                    }
                                    ?>


                                </div>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Description</h5>
                                <p class="card-text">  <?php echo word_limiter($offre['description'],20); ?> </p>
                                <a href="<?php echo site_url('/offres/view/'.$offre['offres_id']) ;?>" class="btn">plus</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>
            </ul>

        </div></div>






<script>
    const a = document.getElementById("a");
    const b = document.getElementById("b");
    const c = document.getElementById("c");

    b.style.display = "none";
    c.style.display = "none";

    const joueur = document.getElementById('1');
    const club = document.getElementById('2');
    const last = document.getElementById('3');
    joueur.style.backgroundColor = '#1ab188';
    club.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
    last.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
    club.style.color ='rgba(255, 255, 255, 0.4)';
    last.style.color ='rgba(255, 255, 255, 0.4)';
    joueur.style.color ='whitesmoke';

    function update(current) {
        let now = current;

        if (now.id == 1) {
            a.style.display = "block";
            b.style.display = "none";
            c.style.display = "none";
            joueur.style.backgroundColor = '#1ab188';
            club.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            last.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            club.style.color ='rgba(255, 255, 255, 0.4)';
            last.style.color ='rgba(255, 255, 255, 0.4)';
            joueur.style.color ='whitesmoke';
        }else if (now.id == 2){
            a.style.display = "none";
            b.style.display = "block";
            c.style.display = "none";
            club.style.backgroundColor = '#1ab188';
            joueur.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            last.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            joueur.style.color ='rgba(255, 255, 255, 0.4)';
            last.style.color ='rgba(255, 255, 255, 0.4)';
            club.style.color ='whitesmoke';

        }else if (now.id == 3){
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "block";
            last.style.backgroundColor = '#1ab188';
            club.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            joueur.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            club.style.color ='rgba(255, 255, 255, 0.4)';
            joueur.style.color ='rgba(255, 255, 255, 0.4)';
            last.style.color ='whitesmoke';

        }
    }



</script>

