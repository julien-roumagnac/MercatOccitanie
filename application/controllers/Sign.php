<?php
class Sign extends CI_Controller{
    public function signin() {

        $data['title']='Connexion';


        $this->load->view('Sign/signin',$data);




    }
    public function signup() {

        $data['title']='Inscription';
        $data['niveaux']=$this->Niveau_model->get_niveaux();
        $data['postes']=$this->Poste_model->get_postes();


        $this->load->view('Sign/signup',$data);




    }
}
?>