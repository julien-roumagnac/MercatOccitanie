

<div class="text-center">
    <h2 ><?=$title?></h2> <br>
<button type="button"  onclick="update(this)" class="offrebtn my-1" id="1">Offres les plus récentes</button>
<button type="button"  onclick="update(this)" class="offrebtn my-1" id="2">Dernieres offres de joueurs </button>
<button type="button"  onclick="update(this)" class="offrebtn my-1" id="3">Dernieres offres de Clubs</button>
    <br>  <a href="<?php echo site_url('offres/create');?>" role="button" class="btn  btn-sm " style="background-color:#d0b83b !important">Ajoutez une offre </a> </p>
</div>

<div class="container" id="a">
    <div class="container">

        <ul class="list-group list-group-flush">


            <?php foreach($lastoffres as $offre) : ?>
                <li class="list-group-item">
                    <div class="card mb-3">
                        <div class="card-header cardtitle row text-center">
                            <div class="col-md-2 col-sm-4"><?php if($offre['id_user']===$user):?><a class="float-left" href="<?php echo base_url('/offres/delete/'.$offre['offres_id']) ;?>" ><img class="float-left" width="20%" src="<?php echo site_url('assets/icons/cancel2.svg');?>"></a> <?php endif?></div>
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

    </div> </div>

<div class="container" id="b">
    <div class="container">

        <ul class="list-group list-group-flush">


            <?php foreach($offresjoueurs as $offrej) : ?>
                <li class="list-group-item">
                    <div class="card mb-3">
                        <div class="card-header cardtitle row text-center">
                            <div class="col-md-2 col-sm-4"><?php if($offrej['id_user']===$user):?><a class="float-left" href="<?php echo base_url('/offres/delete/'.$offrej['offres_id']) ;?>" ><img class="float-left" width="20%" src="<?php echo site_url('assets/icons/cancel2.svg');?>"></a> <?php endif?></div>
                            <div class="col-md-3 col-sm-4">Poste: <?php echo $offrej['poste']; ?></div>
                            <div class="col-md-3 col-sm-4">niveau : <?php echo $offrej['division'];  ?></div>
                            <div class="col-md-4 col-sm-10">Profil du joueur  <a href="<?php echo site_url().'profil/view/'.$offrej['id_user'];  ?>"  class="btn btn-info">ici</a></div>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">  <?php echo word_limiter($offrej['description'],20); ?> </p>
                            <a href="<?php echo site_url('/offres/view/'.$offrej['offres_id']) ;?>" class="btn">plus</a>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>

    </div>
</div>

<div class="container" id="c"> <div class="container">

        <ul class="list-group list-group-flush">


            <?php foreach($offresclubs as $offrec) : ?>
                <li class="list-group-item">
                    <div class="card-header cardtitle row text-center">
                        <div class="col-md-2 col-sm-4"><?php if($offrec['id_user']===$user):?><a class="float-left" href="<?php echo base_url('/offres/delete/'.$offrec['offres_id']) ;?>" ><img class="float-left" width="20%" src="<?php echo site_url('assets/icons/cancel2.svg');?>"></a> <?php endif?></div>
                        <div class="col-md-3 col-sm-4">Poste: <?php echo $offrec['poste']; ?></div>
                        <div class="col-md-3 col-sm-4">niveau : <?php echo $offrec['division'];  ?></div>
                        <div class="col-md-4 col-sm-10">Profil du Club <a href="<?php echo site_url().'profil/view/'.$offrec['id_user'];  ?>"  class="btn btn-info">ici</a></div>

                    </div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">  <?php echo word_limiter($offrec['description'],20); ?> </p>
                            <a href="<?php echo site_url('/offres/view/'.$offrec['offres_id']) ;?>" class="btn">plus</a>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>

    </div> </div>






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

