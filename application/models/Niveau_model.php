<?php
class Niveau_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_niveaux($id=FALSE)
    {
        $id=html_escape($id);
        if ($id===FALSE){

            $query = $this->db->get('niveau');

            return $query->result_array();}
        else {
            $query = $this->db->get_where('niveau',array('niveau_id'=>$id));
            return $query->row_array();
        }

    }


}

?>