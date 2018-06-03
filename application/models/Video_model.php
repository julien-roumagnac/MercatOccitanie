<?php
class Video_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_videos($id=FALSE){
        $id=html_escape($id);

        if ($id===FALSE){

            $query = $this->db->get('videos');

            return $query->result_array();}
        else {
            $query = $this->db->query('SELECT * FROM videos WHERE id_user=?',$id);
            return $query->result_array();
        }

    }
    public function set_video($id,$idlien){
        $id=html_escape($id);
        $idlien=$this->Video_model->getVideoID($idlien);
        $this->db->query('INSERT INTO videos (id_user,id_lien) VALUES (?, ?);',array($id,$idlien));
    }
    private function getVideoID($url){
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        if(isset($match[1])){
            return $id = html_escape($match[1]);
        }
        return '00000';
    }
    public function delete_user($id){

        $id=html_escape($id);
        $this->db->query('DELETE FROM videos WHERE id_user=?',$id);

    }


}

?>