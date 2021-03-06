<?php
class Accueil extends CI_Controller{
    public function connexion() {

        $data['title']='Connexion';


        $this->load->view('Sign/signin',$data);




    }
    public function inscription() {

        $data['title']='Inscription';
        $data['niveaux']=$this->Niveau_model->get_niveaux();
        $data['postes']=$this->Poste_model->get_postes();


        $this->load->view('Sign/signup',$data);




    }
    public function InscriptionJoueur() {
        $profil = array(



            
            'ville'=>$this->input->post('ville'),
            'nom'=>$this->input->post('nom'),
            'prenom'=>$this->input->post('prenom'),
            'id_niveau'=>$this->input->post('niveau_id'),
            'id_poste'=>$this->input->post('poste_id'),
            'num_phone'=>$this->input->post('telephone'),
            'club'=> $this->input->post('club')

        );

        $data['niveaux']=$this->Niveau_model->get_niveaux();
        $data['postes']=$this->Poste_model->get_postes();
        $this->form_validation->set_rules('mail','Email','required|is_unique[user.mail]',array('is_unique'=>'Cet %s est deja utilisé ','required'=>'Vous n\'avez pas rentré l\'%s' ));
        $this->form_validation->set_rules('mdp','mot de passe','required|min_length[6]',array('required'=>'Vous n\'avez pas rentré le %s','min_length'=>'%s trop court ! 7 caracteres minimum' ));
        $this->form_validation->set_rules('nom','Nom','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('prenom','Prenom','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('ville','Ville','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('club','Club','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('telephone','numero de telephone ','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('niveau_id','niveau ','required|in_list[1,6,7,8,9,10]',array('required'=>'Vous n\'avez pas rentré le %s','in_list'=> 'Vous avez essayé de rentrer plusieurs %s ou une valeur inexistante' ));
        $this->form_validation->set_rules('poste_id','poste','required|in_list[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]',array('required'=>'Vous n\'avez pas rentré le %s','in_list'=> 'Vous avez essayé de rentrer plusieurs %s ou une valeur interdite' ));
        if ($this->form_validation->run()===FALSE){



            $this->load->view('Sign/inscription_player',$data);


        }else {

            $this->User_model->create_user();
            $this->Joueur_model->create_joueur($profil,html_escape($this->input->post('mail')));
            redirect('');}
    }
    public function inscriptionClub() {
        $data['niveaux']=$this->Niveau_model->get_niveaux();
        $data['postes']=$this->Poste_model->get_postes();

        $this->form_validation->set_rules('mail','Email','required|is_unique[user.mail]',array('is_unique'=>'Cet %s est deja utilisé ','required'=>'Vous n\'avez pas rentré l\'%s' ));
        $this->form_validation->set_rules('mdp','mot de passe','required|min_length[6]',array('required'=>'Vous n\'avez pas rentré le %s','min_length'=>'%s trop court ! 7 caracteres minimum' ));
        $this->form_validation->set_rules('libelle','libelle','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('adresse','Prenom','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('ville','Ville','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('telephone','numero de telephone ','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
        $this->form_validation->set_rules('niv_team_1','niveau equipe principale','required|in_list[1,6,7,8,9,10]',array('required'=>'Vous n\'avez pas rentré le %s','in_list'=> 'Vous avez essayé de rentrer plusieurs %s ou une valeur inexistante' ));
        $this->form_validation->set_rules('niv_team_2','niveau equipe secondaire','required|in_list[1,6,7,8,9,10]',array('required'=>'Vous n\'avez pas rentré le %s','in_list'=> 'Vous avez essayé de rentrer plusieurs %s ou une valeur inexistante' ));

        if ($this->form_validation->run()===FALSE){



            $this->load->view('Sign/inscription_club',$data);



        }else {
            
            $data = array(



            
            'ville'=>$this->input->post('ville'),
            'libelle'=>$this->input->post('libelle'),
            'adresse'=>$this->input->post('adresse'),
            'id_niveau2'=>$this->input->post('niv_team_2'),
            'id_niveau1'=>$this->input->post('niv_team_1'),
            'contact'=>$this->input->post('telephone'),
            'description'=> $this->input->post('desc')

            );
            $data=html_escape($data);
            $mail=html_escape($this->input->post('mail'));
            $this->User_model->create_user();
            $this->Club_model->create_club($data,$mail);
            redirect('');}
    }
}
?>