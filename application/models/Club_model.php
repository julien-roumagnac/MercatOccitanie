<?php
class Club_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }

    public function get_club($id=false){
        $id=html_escape($id);
        if ($id===FALSE){

            $query =$this->db->query('SELECT * FROM club,niveau as n1 ,niveau as n2 ,user WHERE n1.niveau_id=id_niveau1 AND n2.niveau_id=id_niveau2 AND user_id=id_user')->result_array();


            return $query->result_array();}
        else {
            $query =$this->db->query('SELECT n1.division as d1,n2.division as d2,mail,mdp,libelle,ville,adresse,contact,description,user_id FROM club,niveau as n1 ,niveau as n2 ,user WHERE n1.niveau_id=id_niveau1 AND n2.niveau_id=id_niveau2 AND user_id=?',$id);

            return $query->row_array();
        }

    }
    public function create_club(){
        $id=$this->db->query('SELECT user_id FROM user WHERE mail=?',$this->input->post('mail'))->row_array();
        $data = array(



            'id_user'=>$id['user_id'],
            'ville'=>$this->input->post('ville'),
            'libelle'=>$this->input->post('libelle'),
            'adresse'=>$this->input->post('adresse'),
            'id_niveau2'=>$this->input->post('niv_team_2'),
            'id_niveau1'=>$this->input->post('niv_team_1'),
            'contact'=>$this->input->post('telephone'),
            'description'=> $this->input->post('desc')

        );
        $data=html_escape($data);
        return $this->db->insert('club',$data);
    }
    public function update($id=NULL){

        $bio=html_escape($this->input->post('bio'));

        $this->db->query('UPDATE `club` SET `description` = ? WHERE id_user=?',array($bio,$id));
    }
    public function delete_user($id){
        $id=html_escape($id);
        $this->db->query('DELETE FROM club WHERE id_user=?',$id);
    }


}

?>