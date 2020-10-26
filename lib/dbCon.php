<?php
	class dbCon{
		public $con;
		
		protected $db_host = "fdb30.awardspace.net";
		protected $db_name = "3577757_tangkinhcac";
		protected $db_user = "3577757_tangkinhcac";
		protected $db_pass = "%VSs,Qk?75boZrI4";

		// protected $db_host = "localhost";
		// protected $db_name = "db_tangkinhcac";
		// protected $db_user = "root";
		// protected $db_pass = "";

		function __construct(){
			$this->con = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
			mysqli_set_charset($this->con, 'UTF8');
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
		}
	}
?>