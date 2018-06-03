<?php
class Joueur_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }

    public function get_joueur($id=false){
        $id=html_escape($id);
        if ($id===FALSE){

            $query =$this->db->query('SELECT nom,prenom,ville,num_phone,poste,division,club,bio,mail FROM joueur,niveau,poste,user WHERE poste_id=id_poste AND niveau_id=id_niveau AND user_id=id_user');


            return $query->result_array();}
        else {
            $query =$this->db->query('SELECT nom,prenom,ville,num_phone,poste,division,club,bio,mail FROM joueur,niveau,poste,user WHERE poste_id=id_poste AND niveau_id=id_niveau AND user_id=id_user AND user_id=?',$id);

            return $query->row_array();
        }

    }
    public function create_joueur($data,$mail){
        $id=$this->db->query('SELECT user_id FROM user WHERE mail=?',$mail)->row_array();
        $data['id_user']=$id['user_id'];
        $data=html_escape($data);
        return $this->db->insert('joueur',$data);
    }
    public function update($id=NULL,$bio){
        $id=html_escape($id);
        
        $this->db->query('UPDATE `joueur` SET `bio` = ? WHERE id_user=?',array($bio,$id));
    }
    public function delete_user($id){
        $id=html_escape($id);
        $this->db->query('DELETE FROM joueur WHERE id_user=?',$id);
    }

    public function getEquipe($id=null){
        $id=html_escape($id);
        return $this->db->query('SELECT club FROM joueur where id_user=?',$id)->row_array();

    }
    public function updateEquipe($id=NULL,$newTeam){
        $id=html_escape($id);
        $this->db->query('UPDATE joueur SET club = ? WHERE id_user=?',array($newTeam,$id));
    }



}

?>