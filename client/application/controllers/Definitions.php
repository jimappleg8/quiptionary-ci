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
		$admin['message'] = $this->session->userdata('definition_message');
		if ($this->session->userdata('definition_message') != '')
			$this->session->set_userdata('definition_message', '');

		$this->load->helper(array('text'));
		$this->load->library('form_validation');
		$this->load->model('Definitions_model');
		$this->load->model('Indexes_model');

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

		$this->load->vars($data);
        echo $this->load->view('definitions/list', NULL, TRUE);      
    }

    // -----------------------------------------------------------------------

	/**
	 * processes the search form results
	 */
	private function search()
	{
//		$this->load->model('Recipes');
//		$this->load->model('Ingredients');
//		$this->load->database('read');
      
		$search['words'] = $this->input->post('words');

		$exact = FALSE;
      
		$definition_list = array();
		$matches = array();
		$match_cnt = 0;
		$no_matches = FALSE;
		$show_all = TRUE;
       
		if ($search['words'] != '')
		{
			$words = array_values($this->Indexes_model->stem_phrase($search['words']));

			$word_matches = $this->Indexes_model->get_index_records_by_word($words, $exact);

			foreach ($word_matches AS $wm)
			{
				$matches[$match_cnt][] = $wm['definition_id'];
			}
			if ( ! empty($matches[$match_cnt]))
			{
				$match_cnt++;
			}
			else
			{
				$no_matches = TRUE;
			}
		}

//		echo "<pre>"; print_r($words); echo "</pre>";

		if ($exact && $no_matches == FALSE)
		{
			for ($i=0; $i<count($matches); $i++)
			{
				if ($i == 0)
				{
					$definition_list = $matches[$i];
				}
				else
				{
					$definition_list = array_intersect($matches[$i], $definition_list);
				}
			}
		}
		elseif ( ! $exact)
		{
			foreach ($matches AS $match_array)
			{
				$definition_list = array_merge($match_array, $definition_list);
			}
		}
      
//		echo "<pre>"; print_r($recipe_list); echo "</pre>";

		// get the definitions themselves
		$definitions = array();
		foreach ($definition_list AS $key => $item)
		{
			$definitions[] = $this->Definitions_model->get_definition_data($item);
		}
      
//		echo "<pre>"; print_r($definitions); echo "</pre>";
      
		return $definitions;
	}



}

/* End of file Definitions.php */
/* Location: /application/controllers/Definitions.php */
