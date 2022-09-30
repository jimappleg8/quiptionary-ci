<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	// --------------------------------------------------------------------

	/**
	 * Generates a search index from existing database entries
	 *
	 */
	public function generate_index()
	{
		$this->load->model('Indexes_model');
      
		// get a list of all definitions
		$sql = 'SELECT id FROM definitions';
		$query = $this->db->query($sql);
		$definitions = $query->result_array();
      
		// go through each definition and index
		foreach ($definitions AS $def)
		{
			echo "Indexing definition ID = ".$def['id']."... ";
			$this->Indexes_model->update_search_index($def['id']);
			echo "done.<br>";
		}
	}

}

/* End of file Utilities.php */
/* Location: /application/controllers/Utilities.php */

