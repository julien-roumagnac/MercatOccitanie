<?php
class Offre_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_Offres($id=FALSE)
    {   $id=html_escape($id);
        if ($id===FALSE){

            $query =$this->db->query('SELECT offres_id,description,poste,division,offres.id_user,date_creation FROM offres,niveau,poste,user WHERE poste_id=offres.id_poste AND niveau_id=offres.id_niveau AND user.user_id=offres.id_user ORDER BY offres_id DESC');


            return $query->result_array();}
        else {
            $query =$this->db->query('SELECT offres_id,description,poste,division FROM offres,niveau,poste WHERE poste_id=id_poste AND niveau_id=id_niveau AND offres_id= '.$id);

            return $query->row_array();
        }

    }
    public function get_Offres_joueurs(){
        return $this->db->query('SELECT offres_id,description,poste,division,id_user,date_creation FROM offres,niveau,poste WHERE poste_id=offres.id_poste AND niveau_id=offres.id_niveau AND id_user in (SELECT id_user FROM joueur ) ORDER BY offres_id DESC')->result_array() ;
    }
    public function get_Offres_clubs(){
        return $this->db->query('SELECT offres_id,description,poste,division,id_user,date_creation FROM offres,niveau,poste WHERE poste_id=offres.id_poste AND niveau_id=offres.id_niveau AND id_user in (SELECT id_user FROM club ) ORDER BY offres_id DESC')->result_array() ;
    }

    public function create_offre($iduser){

        $data = array(
            'id_poste'=>$this->input->post('poste_id'),
            'id_niveau'=>$this->input->post('niveau_id'),
            'description'=>$this->input->post('desc'),
            'id_user'=> $iduser

        );
        $data=html_escape($data);
        return $this->db->insert('offres',$data);
    }

    public function get_auteur($idoffre){
        $idoffre=html_escape($idoffre);
        return $this->db->query('SELECT id_user FROM offres WHERE offres_id=?',$idoffre)->row_array();
    }
    public function delete($idoffre){
        $idoffre=html_escape($idoffre);
        return $this->db->query('DELETE FROM offres WHERE offres_id=?',$idoffre);
    }
    public function get_Offres_by_role($role){
        $role=$idoffre=html_escape($role);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and role =?  ORDER BY offres_id DESC',$role)->result_array();

    }
    public function get_Offres_by_poste($poste){
        $poste=html_escape($poste);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and id_poste=?  ORDER BY offres_id DESC',$poste)->result_array();
    }
    public function get_Offres_by_niveau($niveau){
        $niveau=html_escape($niveau);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and id_niveau=?  ORDER BY offres_id DESC',$niveau)->result_array();
    }
    public function get_Offres_by_niveau_poste($niveau,$poste){
        $niveau=html_escape($niveau);
        $poste=html_escape($poste);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and id_niveau=? and id_poste=? ORDER BY offres_id DESC',array($niveau,$poste))->result_array();
}
    public function get_Offres_by_niveau_role($niveau,$role){
        $niveau=html_escape($niveau);
        $role=html_escape($role);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and id_niveau=? and role =? ORDER BY offres_id DESC',array($niveau,$role))->result_array();
    }
    public function get_Offres_by_role_poste($role,$poste){
        $poste=html_escape($poste);
        $role=html_escape($role);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and id_poste=? and role =? ORDER BY offres_id DESC',array($poste,$role))->result_array();
    }
    public function get_Offres_by_role_poste_niveau($role,$poste,$niveau){
        $poste=html_escape($poste);
        $niveau=html_escape($niveau);
        $role=html_escape($role);
        return $this->db->query('SELECT DISTINCT * FROM offres,niveau,poste,user WHERE id_user=user_id AND poste_id=id_poste AND niveau_id=id_niveau and id_niveau=? and id_poste=? and role =? ORDER BY offres_id DESC',array($niveau,$poste,$role))->result_array();
    }
    public function delete_user($id){

        $id=html_escape($id);
        $this->db->query('DELETE FROM offres WHERE id_user=?',$id);

    }



}

?>