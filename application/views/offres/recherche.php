

<?php echo form_open('offres/recherche');?>
<div class="card my-3">
    <div class="card-header cardtitle">
        <h2>Recherche d'offre</h2>
    </div>
    <div class="container my-1 mx-auto text-center">
        <div class="row">
            <div class="form-group col-md-5 col-sm-6 col-6">
                <label for="poste">Poste </label>
                <select multiple name="poste_id" class="form-control" >
                    <option value="-1" >Peu importe</option>
                    <?php foreach ($postes as $poste):?>
                        <option value="<?php echo $poste['poste_id'] ;?>" ><?php echo $poste['poste'] ;?></option>
                    <?php endforeach;?></select>
            </div>
            <div class="form-group col-md-5 col-sm-6 col-6">
                <label for="niveau">Niveau </label>
                <select multiple name="niveau_id" class="form-control" >
                    <option value="-1" >Peu importe</option>
                    <?php foreach ($niveaux as $niveau):?>
                        <option value="<?php echo $niveau['niveau_id'] ;?>" ><?php echo $niveau['division'] ;?></option>
                    <?php endforeach;?></select>
            </div>
            <div class="form-group col-md-2 col-sm-12 col-12 ">
                <label for="niveau">créée par </label>
                <select multiple name="role" class="form-control" >

                    <option value="1" >Club</option>
                    <option value="2" >Joueur</option>
                    <option value="-1" >les deux</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-light"><img width="25px" height="25px" src="<?php echo base_url('assets/icons/white-loupe.svg')?>"></button>


    </div>
    </form>
</div>
<div class="container text-center" >
            <h2>Resultats </h2>
    <div class="container card mt-3 " >


        <ul class="list-group list-group-flush py-3">


            <?php foreach($offres as $offre) : ?>
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
