<?php
class Profil extends CI_Controller{


    public function view($id=NULL) {
        $iduser=$this->Token_model->isLog();

        if($iduser){
            $role=$this->User_model->get_role($id);
            $data['viewid']=$id;
            if($role==2){
                $data['joueur'] = $this->Joueur_model->get_joueur($id);

                $data['titres']=$this->Titre_model->get_titres($id) ;
                $data['clubs']=$this->Clubs_model->get_clubs($id) ;
                $data['videos']=$this->Video_model->get_videos($id) ;

                if(empty($data['joueur'])){
                    show_404();
                }

                $data['title']='Profil ';
                $this->load->view('templates/header',$data);
                $this->load->view('profil/joueur',$data);
                $this->load->view('templates/footer');

            }else {
                $data['club']=$this->Club_model->get_club($id);
                $data['titres']=$this->Titre_model->get_titres($id) ;
                if(empty($data['club'])){
                    show_404();
                }
                $data['title']='Profil ';
                $this->load->view('templates/header',$data);
                $this->load->view('profil/club',$data);
                $this->load->view('templates/footer');
            }





        }else {
            redirect();
        }

    }
    public function updateEquipe (){
        $id=$this->Token_model->isLog();
        $role=$this->User_model->get_role($id);
        $this->form_validation->set_rules('equipe','Nouvelle equipe','required',array('required'=>'Vous n\'avez pas rentré de %s' ));
        if($id){
            if($this->form_validation->run()===FALSE){
                redirect('profil/view/'.$id);

            }
            if($role==2){
                $newTeam=html_escape($this->input->post('equipe'));

                $lastTeam=$this->Joueur_model->getEquipe($id);
                $lastTeam=$lastTeam['club'];

                $this->Joueur_model->updateEquipe($id,$newTeam);
                $this->Clubs_model->set_club($id,$lastTeam);
                redirect('profil/view/'.$id);

            }else {

                redirect('profil/view/'.$id);
            }
        }
        else{
            redirect();
        }
    }



    public function update (){
        $id=$this->Token_model->isLog();
        $role=$this->User_model->get_role($id);
        $this->form_validation->set_rules('bio','biographie','required',array('required'=>'Vous n\'avez pas rentré de %s' ));
       
        if($id){
            
            if($this->form_validation->run()===FALSE){
                printf(' form incomplet');
                redirect('profil/view/'.$id);
                

            }
            if($role==2){
                $bio=html_escape($this->input->post('bio'));
                $this->Joueur_model->update($id,$bio);
                redirect('profil/view/'.$id);

            }else {
                
                $bio=html_escape($this->input->post('bio'));
                $this->Club_model->update($id,$bio);
                redirect('profil/view/'.$id);
            }
            }
        else{
            redirect();
        }
    }
    public function ajout_titre(){
        $id=$this->Token_model->isLog();
        $this->form_validation->set_rules('titre','Succes','required',array('required'=>'Vous n\'avez pas rentré de %s' ));
        if($id){
            if($this->form_validation->run()===FALSE){
                redirect('profil/view/'.$id);

            }
            $newtitre=html_escape($this->input->post('titre'));
            $this->Titre_model->set_titre($id,$newtitre);
            redirect('profil/view/'.$id);

        }else {
            redirect();
        }


    }
    public function ajout_old_club(){
        $id=$this->Token_model->isLog();
        if ($id){
            $equipe=$this->input->post('club');
            $this->Clubs_model->set_club($id,$equipe);
            redirect('profil/view/'.$id);
        }else {
            redirect();
        }


    }
    public function ajout_video(){
        $id=$this->Token_model->isLog();
        $this->form_validation->set_rules('video','video','required',array('required'=>'Vous n\'avez pas rentré de %s' ));
        if ($id){
            if($this->form_validation->run()===FALSE){
                redirect('profil/view/'.$id);

            }
            $url=html_escape($this->input->post('video'));
            $this->Video_model->set_video($id,$url);
            redirect('profil/view/'.$id);
        }else {
            redirect();
        }


    }
    public function delete (){
        $id=$this->Token_model->isLog();
        $role=$this->User_model->get_role($id);
        if($id){
            if($role==2){
                $this->Joueur_model->delete_user($id);
                $this->Clubs_model->delete_user($id);
                $this->Video_model->delete_user($id);
                $this->Titre_model->delete_user($id);
                $this->Offre_model->delete_user($id);
                $this->Token_model->delete_user($id);
                $this->User_model->delete($id);
                delete_cookie('logToken');
                redirect();

            }else {
                $this->Club_model->delete_user($id);
                $this->Titre_model->delete_user($id);
                $this->Token_model->delete_user($id);
                $this->Offre_model->delete_user($id);
                $this->User_model->delete($id);
                delete_cookie('logToken');
                redirect();
            }
        }
        else{
            redirect();
        }
    }



}
?>