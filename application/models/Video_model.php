<?php
class Video_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }
    public function get_videos($id=FALSE)
    {
        if ($id===FALSE){

            $query = $this->db->get('videos');

            return $query->result_array();}
        else {
            $query = $this->db->query('SELECT * FROM videos WHERE id_user=?',$id);
            return $query->result_array();
        }

    }
    public function set_video($id){
        $idlien=$this->Video_model->getVideoID($this->input->post('video'));
        $this->db->query('INSERT INTO videos (id_user,id_lien) VALUES (?, ?);',array($id,$idlien));
    }
    private function getVideoID($url){
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        if(isset($match[1])){
            return $id = $match[1];
        }
        return '00000';
    }


}

?>