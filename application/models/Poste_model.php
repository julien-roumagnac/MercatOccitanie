<?php
class Poste_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_postes($id=FALSE)
    {   $id=html_escape($id);
        if ($id===FALSE){

            $query = $this->db->get('poste');

            return $query->result_array();}
        else {
            $query = $this->db->get_where('poste',array('poste_id'=>$id));
            return $query->row_array();
        }

    }


}

?>