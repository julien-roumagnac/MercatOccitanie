
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>accueil</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url().'/assets/css/signin.css';?>">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- [endif]-->
</head>
<body class=" container" style="background-image: url('<?php echo site_url().'assets/img/bg-soccer2.png';?>');


        height: 1300px;
        background-repeat: repeat-y;
        position: relative;-webkit-background-size: cover;
        background-size: cover; ">

<div class="login-page row" >
    <div class="form mx-auto my-5 display:block col-md-10">

        <?php $attributes = array('class' => 'login-form');
        echo form_open(site_url().'user/connect', $attributes); ?>
        <form class="login-form" action ='<?php echo site_url('Pages/view');?>'>
            <input type="text" name ="mail" placeholder="ex: xxxxx@bla.com"/>
            <input type="password" name="mdp" placeholder="password"/>
            <button>login</button>
            <p class="message">Inscrivez-vous : <a href="<?php echo site_url('Accueil/inscriptionJoueur');?>"> Joueur</a> ou <a href="<?php echo site_url('Accueil/inscriptionClub');?>"> Club</a></p>
        </form>
    </div>
</div>


</body>
</html>

