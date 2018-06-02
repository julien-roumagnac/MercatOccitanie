<?php
class Clubs_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_clubs($id=FALSE)
    {
        if ($id===FALSE){

            $query = $this->db->get('clubs');

            return $query->result_array();}
        else {
            $query = $this->db->query('SELECT * FROM clubs WHERE id_user=?',$id);
            return $query->result_array();
        }

    }
    public function set_club($id,$newclub){

        $this->db->query('INSERT INTO clubs (id_user,club) VALUES (?, ?);',array($id,$newclub));
    }
    public function delete_user($id){

            $id=html_escape($id);
            $this->db->query('DELETE FROM clubs WHERE id_user=?',$id);

    }


}

?>