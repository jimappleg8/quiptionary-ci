<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Definitions extends MY_Controller {


    public function __construct()
    {
        parent::__construct();

        // Force SSL
        //$this->force_ssl();
    }

    // -----------------------------------------------------------------------

	/**
	 * Lists the definitions available
	 */
    public function index($offset = 0)
    {
		$this->load->helper(array('text'));
		$this->load->library('form_validation');
//		$this->load->model('Definitions_model');
//		$this->load->model('Indexes_model');

		$rules = array(
			array(
				'field' => 'words',
				'label' => 'Words',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'You must provide a word to search.',
				),
			),
		);
		$this->form_validation->set_rules($rules);
		
		$data['definitions'] = array();

		if ($this->form_validation->run() == TRUE)
		{
			$data['definitions'] = $this->search();
		}

		$admin['message'] = $this->session->userdata('definition_message');
		if ($this->session->userdata('definition_message') != '')
			$this->session->set_userdata('definition_message', '');

		$data['admin'] = $admin;

		$this->load->vars($data);
        echo $this->load->view('admin/definitions/list', NULL, TRUE);      
    }

    // -----------------------------------------------------------------------

	/**
	 * processes the search form results
	 */
	private function search()
	{
		$this->load->spark('restclient/2.1.0');
		$this->load->library('rest');

		$search['words'] = $this->input->post('words');

		$config = array(
			'server'      => 'http://quiptionary-api:8888/',
			'http_user'   => 'admin',
			'http_pass'   => '1234',
			'http_auth'   => 'digest',
		);
		$this->rest->initialize($config);

		$result = $this->rest->get('v1/results?words='.urlencode($search['words']));
		// this is a trick to convert the data to an array
		$result = json_decode(json_encode($result), TRUE);
		
		//echo '<pre>'; print_r($result); echo '</pre>'; exit;
 
		if (isset($result['status']) && $result['status'] == FALSE)
		{
			$message = (isset($result['error'])) ? $result['error'] : $result['message'];
			$this->session->set_userdata('definition_message', $message);
			return array();
		}
		return $result;
	}

    // -----------------------------------------------------------------------

	/**
	 * Edit a definition
	 */
    public function edit($definition_id)
    {
		$admin['message'] = $this->session->userdata('definition_message');
		if ($this->session->userdata('definition_message') != '')
			$this->session->set_userdata('definition_message', '');

		$this->load->helper(array('text'));
		$this->load->library('form_validation');
		$this->load->model('Definitions_model');
//		$this->load->model('Indexes_model');

		$rules = array(
			array(
				'field' => 'entry_word',
				'label' => 'Entry Word',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'You must provide an entry word.',
				),
			),
			array(
				'field' => 'part_of_speech',
				'label' => 'Part of Speech',
				'rules' => 'trim',
			),
			array(
				'field' => 'plural',
				'label' => 'Plural',
				'rules' => 'trim',
			),
			array(
				'field' => 'definition',
				'label' => 'Definition',
				'rules' => 'required|trim',
			),
			array(
				'field' => 'original_quote',
				'label' => 'Original Quote',
				'rules' => 'trim',
			),
			array(
				'field' => 'author',
				'label' => 'Author',
				'rules' => 'required|trim',
			),
			array(
				'field' => 'verified',
				'label' => 'Verified',
				'rules' => 'trim',
			),
			array(
				'field' => 'source_id',
				'label' => 'Source ID',
				'rules' => 'trim',
			),
			array(
				'field' => 'source_date',
				'label' => 'Source Date',
				'rules' => 'trim',
			),
			array(
				'field' => 'source_description',
				'label' => 'Source Description',
				'rules' => 'trim',
			),
			array(
				'field' => 'other_sources',
				'label' => 'Other Sources',
				'rules' => 'trim',
			),
			array(
				'field' => 'definition_type',
				'label' => 'Definition Type',
				'rules' => 'trim',
			),
			array(
				'field' => 'keywords',
				'label' => 'Keywords',
				'rules' => 'trim',
			),
			array(
				'field' => 'categories',
				'label' => 'Categories',
				'rules' => 'trim',
			),
			array(
				'field' => 'source',
				'label' => 'Source',
				'rules' => 'trim',
			),
			array(
				'field' => 'context',
				'label' => 'Context',
				'rules' => 'trim',
			),
			array(
				'field' => 'foreign',
				'label' => 'Foreign',
				'rules' => 'trim',
			),
			array(
				'field' => 'language',
				'label' => 'Language',
				'rules' => 'trim',
			),
			array(
				'field' => 'sort',
				'label' => 'Sort',
				'rules' => 'trim',
			),
			array(
				'field' => 'game',
				'label' => 'Game',
				'rules' => 'trim',
			),
		);
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['partsofspeech'] = array(
				'a.'      => 'article',
				'n.'      => 'noun',
				'pl.n.'   => 'plural noun',
				'v.'      => 'verb',
				'adj.'    => 'adjective',
				'adv.'    => 'adverb',
				'pron.'   => 'pronoun',
				'conj.'   => 'conjunction',
				'prep.'   => 'preposition',
				'interj.' => 'interjection',
				'excl.'   => 'exclamation',
				'tr.v.'   => 'transitive verb',
				'intr.v.' => 'intransitive verb',
				'abbr.'   => 'abbreviation',
				'phrase'  => 'phrase',
				'?'       => 'unknown',
				'tr.v. (p.p.)' => 'transitive verb, present participle',
				'n.r'     => 'noun',
			);
		
			$data['plural'] = array(
				''  => '',
				'Y' => 'Yes',
				'N' => 'No',
			);
		
			$data['verified'] = array(
				''  => '',
				'Y' => 'Yes',
				'N' => 'No',
			);
		
			$data['definition'] = $this->Definitions_model->get_definition_data($definition_id);
			$data['definition_id'] = $definition_id;
			$data['admin'] = $admin;

			$this->load->vars($data);
        	echo $this->load->view('admin/definitions/edit', NULL, TRUE);      
		}
		else
		{
			$this->_edit($definition_id, $rules);
		}
    }

   // --------------------------------------------------------------------
   
	/**
	 * Processes the edit_site_settings form
	 *
	 */
	function _edit($definition_id, $rules)
	{
		foreach ($rules AS $rule)
		{
			$values[$rule['field']] = $this->input->post($rule['field']);
		}
      
		$this->Definitions_model->update_definition($definition_id, $values);

		$this->session->set_userdata('definition_message', 'The definition has been updated.');

		redirect('admin/definitions/edit/'.$definition_id);
   }


}

/* End of file Definitions.php */
/* Location: /application/controllers/Definitions.php */
