<?php

class Pages extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		
		// load the library
		$this->load->library('layout');
		
		// default page title
		// in case we don't set one in our method
		// example: Blog
		$this->layout->set_title('Pages');
		
	}
	
	public function index() {
		
		// we override the title from the construct
		// example: Recent posts | Blog
		$this->layout->set_title('Welcome' . $this->layout->title_separator . 'Pages');
		
		// we can also add custom css and javascript files
		
		$this->layout->add_includes('css', 'assets/css/screen.css');
		// outputs: <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/screen.css">
		
		$this->layout->add_includes('css', 'assets/css/print.css', 'print');
		// outputs: <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/print.css" media="print">
		
		$this->layout->add_includes('css', 'http://twitter.github.com/bootstrap/assets/css/bootstrap.css', NULL, FALSE);
		// outputs: <link rel="stylesheet" type="text/css" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
		
		$this->layout->add_includes('js', 'assets/js/custom.js');
		// outputs: <script type="text/javascript" src="http://localhost/assets/js/custom.js"></script> in the footer
		
		$this->layout->add_includes('js', 'assets/js/jquery.js', 'header');
		// outputs: <script type="text/javascript" src="http://localhost/assets/js/jquery.js"></script> in the header
		
		$this->layout->add_includes('js', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js', NULL, FALSE);
		// outputs: <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> in the footer
		
		$this->layout->view('pages/index');
		
	}
	
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */