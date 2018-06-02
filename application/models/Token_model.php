<?php
class Token_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function  create_token($id,$token) {

        $hash = password_hash($token, PASSWORD_DEFAULT);

        $data = array(
            'id_user'=>$id,
            'token'=>$hash
        );
        $this->db->insert('userstokens',$data);
        }

    public function isLog(){

        $cookie = $this->input->cookie('logToken');
        $cook = json_decode($cookie,true);




        if (isset($cookie)){

            $idUser=$cook['id'];
            $token=$cook['token'];
            $query = $this->db->query('SELECT token FROM userstokens WHERE id_user=?',$idUser)->result_array();
            foreach ($query as $tokenuser){
                if(password_verify($token,$tokenuser['token'])){
                    return $idUser;
                }
            }
            return FALSE ;
            }

    }
    public function get_tokens($id){
        $id=html_escape($id);
        return  $this->db->query('SELECT * FROM userstokens WHERE id_user=?',$id)->result_array();
    }
    public function delete_token($iduser,$tok){

        $tokens = $this->Token_model->get_tokens($iduser);
        foreach ( $tokens as $token){
            if( password_verify($tok,$token['token'])){
                $this->db->query('DELETE FROM userstokens WHERE token= ? AND userstokens.id_user =?',array($token['token'],$iduser));
            }
        }

    }
    public function delete_user($id){

        $id=html_escape($id);
        $this->db->query('DELETE FROM userstokens WHERE id_user=?',$id);

    }

}