

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

        <button type="submit" class="btn btn-light"><img width="20%" src="<?php echo base_url('assets/icons/loupe.svg')?>"></button>


    </div>
    </form>
</div>
<div class="container">

    <ul class="list-group list-group-flush">


        <?php foreach($offres as $offre) : ?>
            <li class="list-group-item">
                <div class="card mb-3">
                    <div class="card-header cardtitle row text-center">
                        <div class="col-md-2 col-sm-4">
                            <?php if($offre['id_user']===$user):?>

                                 <a class="float-left" href=" <?php echo base_url('/offres/delete/'.$offre['offres_id']) ;?>" >
                                     <img class="float-left" width="20%" src="<?php echo site_url('assets/icons/cancel2.svg');?>">
                                </a>
                            <?php endif?>
                        </div>
                        <div class="col-md-3 col-sm-4">Poste: <?php echo $offre['poste']; ?></div>
                        <div class="col-md-3 col-sm-4">niveau : <?php echo $offre['division'];  ?></div>
                        <div class="col-md-4 col-sm-10">En savoir plus sur l'auteur  <a href="<?php echo site_url().'profil/view/'.$offre['id_user'];  ?>"  class="btn btn-info">ici</a></div>

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
