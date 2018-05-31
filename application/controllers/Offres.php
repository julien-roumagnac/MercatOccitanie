<?php

    class Offres extends CI_Controller{
        public function index(){
            $idUser=$this->Token_model->isLog();
            if($idUser){
            $data['title']='Dernieres Offres';
            $data['lastoffres']= $this->Offre_model->get_Offres();
            $data['offresjoueurs']= $this->Offre_model->get_Offres_joueurs();
            $data['offresclubs']= $this->Offre_model->get_Offres_clubs();
            $data['role']=$this->User_model->get_role($idUser);
            $data['user'] = $idUser;
            $this->load->view('templates/header',$data);
            $this->load->view('offres/index',$data);
            $this->load->view('templates/footer');}
            else{
                redirect();
            }
        }
        public function recherche(){
            $idUser=$this->Token_model->isLog();
            $data['poste']='-1';
            $data['niveau']='-1';
            $data['role']='-1';
            if($idUser) {
                $data['niveaux']=$this->Niveau_model->get_niveaux();
                $data['postes']=$this->Poste_model->get_postes();
                $data['poste']=$this->input->post('poste_id');
                $data['niveau']=$this->input->post('niveau_id');
                $data['role']=$this->input->post('role');
                $data['user'] = $idUser;


                if ($data['poste']=='-1'&&'-1'==$data['niveau']&&$data['role']=='-1'){
                    $data['offres'] = $this->Offre_model->get_Offres();

                }
                elseif ($data['poste']=='-1'&&'-1'==$data['niveau']){
                    $data['offres'] = $this->Offre_model->get_Offres_by_role($data['role']);


                }
                elseif ($data['role']=='-1'&&'-1'==$data['niveau']){
                    $data['offres'] = $this->Offre_model->get_Offres_by_poste($data['poste']);


                }
                elseif ($data['role']=='-1'&&'-1'==$data['poste']){
                    $data['offres'] = $this->Offre_model->get_Offres_by_niveau($data['niveau']);


                }
                elseif ($data['role']=='-1'){
                    $data['offres'] = $this->Offre_model->get_Offres_by_niveau_poste($data['niveau'],$data['poste']);

                }
                elseif ($data['poste']=='-1'){
                    $data['offres'] = $this->Offre_model->get_Offres_by_niveau_role($data['niveau'],$data['role']);

                }
                elseif ($data['niveau']=='-1'){
                    $data['offres'] = $this->Offre_model->get_Offres_by_role_poste($data['role'],$data['poste']);

                }else {
                    $data['offres'] = $this->Offre_model->get_Offres_by_role_poste_niveau($data['role'],$data['poste'],$data['niveau']);
                                   }

                $this->load->view('templates/header');
                $this->load->view('offres/recherche',$data);
                $this->load->view('templates/footer');
            }

        else{
                    redirect();
                }
        }
        public function view($id= NULL){
            if($this->Token_model->isLog()) {
                $data['offre'] = $this->Offre_model->get_Offres($id);
                if (empty($data['offre'])) {
                    show_404();
                }
                $this->load->view('templates/header', $data);
                $this->load->view('offres/view', $data);
                $this->load->view('templates/footer');
            }else {
                redirect();
            }

        }
        public function create(){
            $idUser=$this->Token_model->isLog();
            if($idUser){
            $data['title']='Creer Offre';
            $data['niveaux']=$this->Niveau_model->get_niveaux();
            $data['postes']=$this->Poste_model->get_postes();
            $data['iduser']=$idUser;

            $this->form_validation->set_rules('poste_id','Poste du joueur','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
            $this->form_validation->set_rules('niveau_id','niveau du joueur','required',array('required'=>'Vous n\'avez pas rentré le %s' ));
            $this->form_validation->set_rules('desc','description','required',array('required'=>'Vous n\'avez pas rentré de %s' ));

            if ($this->form_validation->run()===FALSE){
                $this->load->view('templates/header',$data);
                $this->load->view('offres/create',$data);
                $this->load->view('templates/footer');

            }else {
                $this->Offre_model->create_offre($idUser);
                redirect('offres/index');
            }}
            else if ( $this->Token_model->isLog()){
                redirect('offres/index');
            }else {
                redirect();
            }

            }

            public function delete($idoffre){
                $last_url=$this->input->post('action');
                $auteur =$this->Offre_model->get_auteur($idoffre);
            if($auteur['id_user']===$this->Token_model->isLog()){
                    $this->Offre_model->delete($idoffre);
                    redirect('pages/view');
            }

            }
        public function test(){

            $this->load->view('templates/header');
            $this->load->view('offres/test');
        }

    }

?>