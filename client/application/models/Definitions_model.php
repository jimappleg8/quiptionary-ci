<?php

class Definitions_model extends CI_Model {

//	public $title;
//	public $content;
//	public $date;

    // -----------------------------------------------------------------------

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

    // -----------------------------------------------------------------------

	/**
	 * Returns array of definition info
	 *
	 * @access   public
	 * @return   array
	 */
	public function get_definition_data($definition_id)
	{
		$sql = 'SELECT * '.
			   'FROM definitions '.
			   'WHERE id = '.$definition_id.' ';
		$query = $this->db->query($sql);
		$definition = $query->row_array();
      
		return $definition;
	}

	// --------------------------------------------------------------------

	public function get_definitions($offset = 0, $limit = 20)
	{
		$query = $this->db->get('definitions', $limit, $offset);
		return $query->result_array();
	}

    // -----------------------------------------------------------------------

	public function get_definition_count()
	{
		return $this->db->count_all('definitions');
	}

	// --------------------------------------------------------------------

	public function update_definition($definition_id, $values)
	{
		$this->db->where('id', $definition_id);
		$this->db->update('definitions', $values);
	}

}

/* End of file Definitions_model.php */
/* Location: /application/models/Definitions_model.php */
