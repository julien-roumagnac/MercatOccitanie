
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Accueil</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url().'/assets/css/signin.css';?>">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- [endif]-->
</head>
<body class="bg-white">

<div class="login-page">
    <div class="form mx-auto display:block">

        <?php $attributes = array('class' => 'login-form');
        echo form_open(site_url().'user/connect', $attributes); ?>
        <form class="login-form" action ='<?php echo site_url('Pages/view');?>'>
            <input type="text" name ="mail" placeholder="ex: xxxxx@bla.com"/>
            <input type="password" name="mdp" placeholder="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="<?php echo site_url('Sign/signup');?>">Create an account</a></p>
        </form>
    </div>
</div>


</body>
</html>

