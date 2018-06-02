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
<body>

<div class="text-center mx-3 my-3 " id ="forms" >
    <div id ='jForm'>


        <?php echo validation_errors('<p class="text-danger">','</p>');?>
        <?php $attributes = array('class' => 'mx-auto mt-2 ', 'id' => 'formu', 'class'=>"jform display:block mx-auto mt-2");

        echo form_open(site_url().'accueil/inscriptionJoueur', $attributes); ?>

        <div class="form-row" >

            <div class="form-group  col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="mail" placeholder="Email">
            </div>
            <div class="form-group  col-md-6">
                <label for="inputPassword4">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" placeholder="7 caractere minimum">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="inputprenom">Prenom</label>
                <input type="text" class="form-control" name="prenom" placeholder="ex : jean ">
            </div>
            <div class="form-group  col-md-6">
                <label for="inputNom">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="ex: dupont">
            </div>
        </div>
        <div class="form-group">
            <label for="club">Equipe actuelle</label>
            <input type="text" class="form-control" name="club" placeholder="ex : U19 MHSC">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Ville</label>
                <input type="text" class="form-control" name="ville">
            </div>
            <div class="form-group col-md-6">
                <label for="telephone">telephone</label>
                <input type="numero" class="form-control" name="telephone" placeholder="ex : 067477676">
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

        <button type="submit">Inscription</button>
        <p >Deja inscrit ?<a style="color:#1ab188 " href="<?php echo site_url();?>">retour connexion</a></p>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>