<?php
class User extends CI_Controller{


    public function create() {
        $this->form_validation->set_rules('mail','Email','required|is_unique[user.mail]',array('is_unique'=>'Cet %s est deja utilisé ','required'=>'Vous n\'avez pas rentré l\'%s' ));
        $this->form_validation->set_rules('mdp','mot de passe','required',array('required'=>'Vous n\'avez pas rentré le %s' ));


        if ($this->form_validation->run()===FALSE){
            $this->load->view('Sign/signup');


        }else {
        $this->User_model->create_user();
        redirect('');}
        }

    public function create_player() {
        $this->form_validation->set_rules('mail','Email','required|is_unique[user.mail]',array('is_unique'=>'Cet %s est deja utilisé ','required'=>'Vous n\'avez pas rentré l\'%s' ));
        $this->form_validation->set_rules('mdp','mot de passe','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('nom','Nom','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('prenom','Prenom','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('ville','Ville','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('club','Club','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('telephone','numero de telephone ','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('niveau_id','niveau ','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('poste_id','poste','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        if ($this->form_validation->run()===FALSE){
            redirect('sign/signup');
            }else {
            $this->User_model->create_user();
            $this->Joueur_model->create_joueur();
            redirect('');}
    }

    public function create_club() {
        $this->form_validation->set_rules('mail','Email','required|is_unique[user.mail]',array('is_unique'=>'Cet %s est deja utilisé ','required'=>'Vous n\'avez pas rentré l\'%s' ));
        $this->form_validation->set_rules('mdp','mot de passe','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('libelle','libelle','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('adresse','Prenom','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('ville','Ville','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('telephone','numero de telephone ','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('niv_team_1','niveau equipe principale','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('niv_team_2','niveau equipe secondaire','required',array('required'=>'Vous n\'avez pas rentré le %s' ));

        if ($this->form_validation->run()===FALSE){
            redirect('sign/signup');
        }else {
            $this->User_model->create_user();
            $this->Club_model->create_club();
            redirect('');}
    }
        public function connect(){
            $exist = $this->User_model->exist();

            $cstrong = TRUE ;
            $token = bin2hex(openssl_random_pseudo_bytes ( 64, $cstrong));
            $value = array (
                'token'=> $token,
                'id' => $exist
            );
            $cookie = $this->input->cookie('logToken');
            $cook = json_decode($cookie,true);

            $tok = $cook['token'];
            if ($exist){
                $iduser= $this->Token_model->isLog();
                $this->Token_model->create_token($exist,$token);
                $this->Token_model->delete_token($iduser,$tok);
                delete_cookie('logToken');
                $this->input->set_cookie('logToken',json_encode($value),(60*60*24),'','/','',null,TRUE );
                redirect('pages/view');



            }
            else{
                redirect('');

            }
    }
        public function logout(){
            $iduser= $this->Token_model->isLog();
            $cookie = $this->input->cookie('logToken');
            $cook = json_decode($cookie,true);

            $tok = $cook['token'];
            if ($iduser){
                $this->Token_model->delete_token($iduser,$tok);
                delete_cookie('logToken');
                redirect('');
            }else {
                redirect();
            }


        }
}
?>