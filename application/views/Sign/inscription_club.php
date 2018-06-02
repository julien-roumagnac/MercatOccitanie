<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Inscription</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo site_url().'assets/css/signup.css';?>" rel="stylesheet">

</head>
<body style="background-image: url('<?php echo site_url().'assets/img/bg-soccer2.png';?>');
        height: 1300px;
        background-repeat: repeat-y;
        position: relative;-webkit-background-size: cover;
        background-size: cover; ">

<div class="text-center  my-3 " id ="forms" >
    <div id = "eForm" >
        <?php echo validation_errors('<p class="text-danger">','</p>');?>
        <?php

        $attributes = array('class' => 'mx-auto mt-2', 'id' => 'formu', 'class'=>"jform display:block mx-auto mt-2");

        echo form_open(site_url().'accueil/inscriptionClub', $attributes); ?>


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
        <button type="submit" >Inscription</button>
        <p >Deja inscrit ?<a style="color:#1ab188 " href="<?php echo site_url();?>">retour connexion</a></p>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>