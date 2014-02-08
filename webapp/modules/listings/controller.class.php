<?php

	class controller extends base_controller {

		function init() {
            $this->listings = new listings($this->reg, "listings");
            $this->devices = new devices($this->reg, "devices");
            if($this->check_post('device_id')) {
                if(!($dev_id=$this->devices->insert_row(array('device_id'=>$dev_id)))) $this->fail("couldnt create device");
            } else {
//                $this->fail("missing device id");
            }
		}

		function index() {
            
		}

        function get_by_id($id) {
            $this->success("",array('listing'=>$this->listings->get_full_listing($id)));
        }

        function insert_listing($user_id) {
            if(!$this->check_post(array('title','rate','start_date','end_date'))) $this->fail("missing required params");
            $p = $_POST;
            $vals = array('user_id'=>$userid,'title'=>$p['title']);
            $vals = $this->add_if_posted('description');
            $vals = $this->add_if_posted('rate');
            if(!($id=$this->listings->insert_row($vals))) $this->fail("couldnt add listing");
            if($this->check_post(array('tags'))) {
               $tags = explode(',', $_POST['tags']);
               foreach($tags as $t) $this->lt->insert_row(array('listing_id'=>$id,'tag'=>$tag));
            }
            $this->success("",array('listing_id'=>$id));  
        } 

        function search($query="") {
            if($query=="") $results = $this->listings->get_recent(3600*2);
            else $results = $this->listings->search($query);
            $full_results = array();
            foreach($results as $res) {
                $res['images'] = $this->listings->get_images($res['id']);
                $res['dates'] = $this->listings->get_dates($res['id']);
                $res['tags'] = $this->listings->get_tags($res['id']);
                $full_results[] = $res;
            }
            $this->success("",array('results'=>$full_results));
        }

	}

?>
