<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Inscription</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo site_url().'/assets/css/signup.css';?>" rel="stylesheet">

</head>
<body>
<?php echo validation_errors('<p class="text-danger">','</p>');?>
<div class="text-center mx-3 my-3 " id ="forms" >


        <div class="btn-group  " role="group" aria-label="Basic example">

            <button type="button"  onclick="ShowJ()" class="" id="playerBtn">Joueur</button>
            <button type="button"  onclick="ShowE()" class="" id="teamBtn">Club </button>

        </div>


        <div id ='jForm'>



            <?php $attributes = array('class' => 'mx-auto mt-2 ', 'id' => 'formu');
            echo form_open(site_url().'user/create_player', $attributes); ?>

            <div class="form-row" >
                <?php echo validation_errors('<p class="text-danger">','</p>');?>
                <div class="form-group  col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="mail" placeholder="Email">
                </div>
                <div class="form-group  col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="mdp" placeholder="Password">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group  col-md-6">
                    <label for="inputprenom">Prenom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Nicolas ">
                </div>
                <div class="form-group  col-md-6">
                    <label for="inputNom">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Guary">
                </div>
            </div>
                <div class="form-group">
                    <label for="club">Club</label>
                    <input type="text" class="form-control" name="club" placeholder="FC polytech">
                </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Ville</label>
                    <input type="text" class="form-control" name="ville">
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone">telephone</label>
                    <input type="numero" class="form-control" name="telephone" placeholder="067477676">
                </div>
                <div class="form-group col-md-6">
                    <label for="poste">Poste </label>
                    <select multiple name="poste_id" class="form-control" >
                        <?php foreach ($postes as $poste):?>
                            <option class="text-dark" name="poste_id" value="<?php echo $poste['poste_id'] ;?>" ><?php echo $poste['poste'] ;?></option>
                        <?php endforeach;?></select>
                </div>
                <div class="form-group col-md-6">
                    <label for="niveau">Niveau </label>
                    <select multiple name="niveau_id" class="form-control" >
                        <?php foreach ($niveaux as $niveau):?>
                            <option class="text-dark"  name="niveau_id" value="<?php echo $niveau['niveau_id'] ;?>" ><?php echo $niveau['division'] ;?></option>
                        <?php endforeach;?></select>
                </div>
                <input type="hidden" name="role" value ="2" >

            </div>

            <button type="submit">Sign in</button>
               <p >Deja inscrit ?<a style="color:#1ab188 " href="<?php echo site_url();?>">retour connexion</a></p>
            </form>
        </div>




    <div id = "eForm" >
       <?php

       $attributes = array('class' => 'mx-auto mt-2', 'id' => 'formu');
       echo form_open(site_url().'user/create_club', $attributes); ?>


            <div class="form-row" >
                <div class="form-group col-md-6">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" name="mail" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="mdp">Password</label>
                    <input type="password" class="form-control" name="mdp" placeholder="Password">
                </div>
            </div>
        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="inputprenom">Libelle Club</label>
                <input type="text" class="form-control" name="libelle" placeholder="Nicolas ">
            </div>
            <div class="form-group  col-md-6">
                <label for="inputNom">Telephone</label>
                <input type="text" class="form-control" name="telephone" placeholder="0434343456">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="inputprenom">Ville</label>
                <input type="text" class="form-control" name="ville" placeholder="Saint-marcel d'ardeche ">
            </div>
            <div class="form-group  col-md-6">
                <label for="inputNom">Adresse</label>
                <input type="text" class="form-control" name="adresse" placeholder="3 rue de la paix">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description du Club</label>
            <textarea class="form-control"  name="desc" rows="1"></textarea>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="niveau">Niveau equipe 1 </label>
            <select multiple name="niv_team_1" class="form-control" >
                <?php foreach ($niveaux as $niveau):?>
                    <option class="text-dark" name="niv_team_1" value="<?php echo $niveau['niveau_id'] ;?>" ><?php echo $niveau['division'] ;?></option>
                <?php endforeach;?></select>
        </div>
        <div class="form-group col-md-6">
            <label for="niveau">Niveau equipe 2</label>
            <select multiple name="niv_team_2" class="form-control" >
                <?php foreach ($niveaux as $niveau):?>
                    <option class="text-dark" name="niv_team_2" value="<?php echo $niveau['niveau_id'] ;?>" ><?php echo $niveau['division'] ;?></option>
                <?php endforeach;?></select>
        </div>
        </div>
            <input type="hidden" name="role" value ="1" >
                <button type="submit" >Sign in</button>
                <p >Deja inscrit ?<a style="color:#1ab188 " href="<?php echo site_url();?>">retour connexion</a></p>
            </form>
        </div>
    </div>

<script>
    const j = document.getElementById("jForm");
    const e = document.getElementById("eForm");
    e.style.display = "none";
    const tBtn = document.getElementById('teamBtn');
    const jBtn = document.getElementById('playerBtn');
    function ShowJ() {

        if (j.style.display === "none") {
            j.style.display = "block";
            e.style.display = "none";
            jBtn.style.backgroundColor = '#1ab188';
            tBtn.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            tBtn.style.color ='rgba(255, 255, 255, 0.4)';
            jBtn.style.color ='whitesmoke';
        }
    }
    function ShowE() {

        if (e.style.display === "none") {
            e.style.display = "block";
            j.style.display = "none";


            tBtn.style.backgroundColor = '#1ab188';
            jBtn.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            jBtn.style.color ='rgba(255, 255, 255, 0.4)';
            tBtn.style.color ='whitesmoke';
        }
    }

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
