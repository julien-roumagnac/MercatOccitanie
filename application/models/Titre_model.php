<?php
class Titre_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_titres($id=FALSE)
    {
        if ($id===FALSE){

            $query = $this->db->get('titre');

            return $query->result_array();}
        else {
            $query = $this->db->query('SELECT * FROM titre WHERE id_user=?',$id);
            return $query->result_array();
        }

    }
    public function set_titre($id){
        $newtitre=$this->input->post('titre');
        $this->db->query('INSERT INTO titre (id_user,titre) VALUES (?, ?);',array($id,$newtitre));
    }


}

?>