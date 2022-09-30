<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class Results extends REST_Controller {

	function __construct()
	{
		// Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
    
    // --------------------------------------------------------------------------

    public function index_get()
    {
		$this->load->model('Definitions_model');
		$this->load->model('Indexes_model');

        $search['words'] = $this->get('words');
    
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
      
		// Get the definitions themselves

		$definitions = array();
		foreach ($definition_list AS $key => $item)
		{
			$definitions[] = $this->Definitions_model->get_definition_data($item);
		}
      
        if ( ! empty($definitions))
        {
            $this->set_response($definitions, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Word could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

}
