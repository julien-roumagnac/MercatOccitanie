<?php
class Titre_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_titres($id=FALSE)
    {   $id=html_escape($id);
        if ($id===FALSE){

            $query = html_escape($this->db->get('titre'));

            return $query->result_array();}
        else {
            $query = $this->db->query('SELECT * FROM titre WHERE id_user=?',$id);
            return $query->result_array();
        }

    }
    public function set_titre($id){
        $id=html_escape($id);
        $newtitre=html_escape($this->input->post('titre'));
        $this->db->query('INSERT INTO titre (id_user,titre) VALUES (?, ?);',array($id,$newtitre));
    }
    public function delete_user($id){

        $id=html_escape($id);
        $this->db->query('DELETE FROM titre WHERE id_user=?',$id);

    }

}

?>