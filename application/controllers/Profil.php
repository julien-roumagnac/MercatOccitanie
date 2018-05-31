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



            public function update (){
        $id=$this->Token_model->isLog();
                if($id){
        $this->Joueur_model->update($id);
        redirect('profil/view/'.$id);}
        else{
                    redirect();
        }
    }
    public function ajout_titre(){
        $id=$this->Token_model->isLog();
        if($id){
            $this->Titre_model->set_titre($id);
            redirect('profil/view/'.$id);

        }else {
            redirect();
        }


    }
    public function ajout_old_club(){
    $id=$this->Token_model->isLog();
    if ($id){
        $this->Clubs_model->set_club($id);
        redirect('profil/view/'.$id);
    }else {
        redirect();
    }


    }
    public function ajout_video(){
        $id=$this->Token_model->isLog();
        if ($id){
            $this->Video_model->set_video($id);
            redirect('profil/view/'.$id);
        }else {
            redirect();
        }


    }



}
?>