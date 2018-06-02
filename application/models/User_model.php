<?php
class User_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function exist(){

           $mail = html_escape($this->input->post('mail'));
           $mdp = html_escape($this->input->post('mdp'));

        $query = $this->db->query('SELECT * FROM user WHERE mail=?',$mail)->result_array();

        if ( password_verify($mdp,$query[0]['mdp']) && $mail===$query[0]['mail'] ){
            return $query[0]['user_id'] ;

        }else {
            return FALSE;
        }



    }


    public function create_user(){

        $data = array(
            'mail'=>$this->input->post('mail'),
            'mdp'=> password_hash($this->input->post('mdp'), PASSWORD_DEFAULT),
            'role'=> $this->input->post('role')
        );
        $data=html_escape($data);
        return $this->db->insert('user',$data);
    }
    public function get_role($id){
        $id=html_escape($id);
        $role = $this->db->query('SELECT role FROM user WHERE user_id=?',$id)->row_array();
        return $role['role'];
    }


}

?>