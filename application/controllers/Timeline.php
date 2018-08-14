<?php
class Timeline extends CI_Controller {

    function __construct() {      
        parent::__construct();
    }


    
    public function index(){
        $arr_data = array();
        $idpj = "1";
/*
        $query = ("SELECT * FROM `list_project`
                    LEFT JOIN list_task on list_project.id = list_task.id_project
                    LEFT JOIN list_dolist on list_task.id = list_dolist.id_task
                    WHERE list_project.id = '$idpj'"); 
        $sites = $this->db->query($query);
        $sites = $sites->result_array();

        echo '<pre>';
        print_r($sites);
        echo  '</pre>';
        */

        $query_pj = ("SELECT * FROM `list_project`WHERE id = '$idpj'"); 
        $sites_pj = $this->db->query($query_pj);
        $sites_pj = $sites_pj->result_array();
        $arr_data = $sites_pj;

        

        foreach($sites_pj as $pj){
            $arr_data = $pj;

            $id_pj = $pj['id'];
            $query_task = ("SELECT * FROM `list_task`WHERE 	id_project = '$id_pj' "); 
            $sites_task = $this->db->query($query_task);
            $sites_task = $sites_task->result_array();


            foreach($sites_task as $tack){
                $arr_data['tack'.$tack['id']] = $tack;

                if( $tack['startdate'] <= $tack['duedate'] ){

                }else{

                }

                $id_tack = $tack['id'];
                $query_dolist = ("SELECT * FROM `list_dolist`WHERE 	id_task = '$id_tack' "); 
                $sites_dolist = $this->db->query($query_dolist);
                $sites_dolist = $sites_dolist->result_array();

                $arr_data['tack'.$tack['id']]['dolist'] = $sites_dolist;
            }
            

        }


        $date1=date_create("2018-08-01");
        $date2=date_create("2018-08-31");
        $diff=date_diff($date1,$date2);
        $coutday=$diff->format("%R%a");
        
        echo '<pre>';
        print_r($arr_data);
        echo  '</pre>';

        
        
        $data['coutday'] = $coutday;
        $data['sites_pj'] = $sites_pj;
        $data['sites_task'] = $sites_task;
        $data['sites_dolist'] = $sites_dolist;
        $data['arr_data'] = $arr_data;

        $this->load->view('timeline_view',$data);




    }//f.index




}//class