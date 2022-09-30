<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {


    public function __construct()
    {
        parent::__construct();

        // Force SSL
        //$this->force_ssl();
    }

    // -----------------------------------------------------------------------

	/**
	 * This is supposed to redirect to a login page if not logged in.
	 */
    public function index()
    {
        if ($this->require_role('admin'))
        {
            echo $this->load->view('admin_header', '', TRUE);
            echo '<p>You are logged in!</p>';
            echo $this->load->view('admin_footer', '', TRUE);
        }
    }

    // -----------------------------------------------------------------------

    /**
     * This login method only serves to redirect a user to a 
     * location once they have successfully logged in. It does
     * not attempt to confirm that the user has permission to 
     * be on the page they are being redirected to.
     */
    public function signin()
    {
        // Method should not be directly accessible
        if ($this->uri->uri_string() == 'admin/signin')
            show_404();

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post')
            $this->require_min_level(1);

        $this->setup_login_form();

		$html = $this->load->view('admin_header', '', TRUE);
        $html .= $this->load->view('sign-in', '', TRUE);
		$html .= $this->load->view('admin_footer', '', TRUE);

        echo $html;
    }

    // --------------------------------------------------------------

    /**
     * Log out
     */
    public function signout()
    {
        $this->authentication->logout();

        redirect( secure_site_url( LOGIN_PAGE . '?logout=1') );
    }

}

/* End of file Admin.php */
/* Location: /application/controllers/Admin.php */
