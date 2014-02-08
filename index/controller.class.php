<?php

	class controller extends base_controller {

		function init() {
            $this->jobs = new jobs($this->reg);
            $this->recs = new recipients($this->reg);
            $this->msgs = new messages($this->reg);
            $this->files = new files($this->reg); 
            if(isset($_SESSION['job'])) {
                $jobid = $_SESSION['job']['id'];
                $opened = $_SESSION['opened'] ? true : false;
                unset($_SESSION);
                $_SESSION = array();
                $_SESSION['job'] = $this->jobs->get_by_id($jobid);
                $_SESSION['job']['numbers'] = $this->recs->get_by_jobid($jobid);
                $_SESSION['job']['message'] = $this->msgs->get_by_jobid($jobid);
                $_SESSION['files'] = $this->files->get_by_jobid($jobid);
                $_SESSION['opened'] = $opened;
            }
            for($i=0; $i<count($_SESSION['files']); $i++) {
                $_SESSION['files'][$i]['saved']=true;
            }
		}

		function index() {

		}

        function reset() {
            if($_SESSION['opened']) {
                unset($_SESSION);
                $_SESSION = array();
                session_destroy();
                session_start();
            }
            header('Location: /');
        }
		
		function terms() {
            $this->reg->layout_file = "blank.php";
		}
	
		function privacy() {
            $this->reg->layout_file = "blank.php";
		}
	
		function checkout() {
            $this->reg->layout_file = "raw.php";
		}
		
		function contact() {
            if(isset($_POST['email']) && !empty($_POST['email'])) {
                if(isset($_POST['message']) && !empty($_POST['message'])) {
                    $contact = new contact($this->reg);
                    $contact->create($_POST['email'],$_POST['message']);
                    mail('fabio@blastpress.com','message from blastpress', "new message: {$_POST['message']}"); 
                    $this->mailsend = true;
                }
            }
		}

		function confirm() {
            $this->reg->layout_file = "raw.php";
		}

        function recipients() {
            $this->reg->layout_file = "raw.php";
        }

        function import() {
            $this->reg->layout_file = "raw.php";
        }

        function message() {
            $this->reg->layout_file = "raw.php";
        }

        function overview() {
            $this->reg->layout_file = "raw.php";
        }

	}

?>
