<?php

class Indexes_model extends CI_Model {

	/**
	 * Weighting factors for indexed parts
	 */
	var $definition_weight = 1;
	var $word_weight = 2;
	var $keyword_weight = 2;

	// --------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Retrieve the index records for the specified recipe ID
	 *
	 * @param   int     The Recipe ID
	 * @return  array   An array of index records
	 *
	 */
/*
	function get_index_records($recipe_id)
	{
		$sql = 'SELECT * '.
			'FROM rcp_index '.
			'WHERE RecipeID = '.$recipe_id;
		$query = $this->read_db->query($sql);
		$indexes = $query->result_array();

		return $indexes;
	}
*/

   // --------------------------------------------------------------------

	/**
	 * Retrieve the index records that match a word search
	 *
	 * @param   array   The words that are being searched for
	 * @param   bool    Whether the match should be exact
	 * @return  array   An array of index records
	 *
	 */
	function get_index_records_by_word($words, $exact = FALSE)
	{
		$sql_words = array();
		$nb_words = count($words);

		// define the base query
		foreach ($words AS $word)
		{
			$sql_words[] = 'i.word = "'.$word.'"';
		}
		$sql_wordlist = implode(' OR ', $sql_words);

		$sql = 'SELECT DISTINCT i.definition_id, COUNT(*) AS nb, '.
			   'SUM(weight) AS total_weight '.
			   'FROM definition_index AS i, definitions AS d '.
			   'WHERE i.definition_id = d.id '.
			   'AND ('.$sql_wordlist.') '.
			   'GROUP BY i.definition_id ';
		// AND query?
		if ($exact)
		{
			$sql .= 'HAVING nb = '.$nb_words.' ';
		}
		$sql .= 'ORDER BY nb DESC, total_weight DESC';

		$query = $this->db->query($sql);
		$indexes = $query->result_array();

		return $indexes;
	}

	// --------------------------------------------------------------------

	function update_search_index($definition_id)
	{
		// delete existing search index entries about this recipe
		$this->db->where('definition_id', $definition_id);
		$this->db->delete('definition_index');

		// create a new entry for each of the words of the definition
		foreach ($this->get_words($definition_id) as $word => $weight)
		{
			$index['definition_id'] = $definition_id;
			$index['word'] = $word;
			$index['weight'] = $weight;
			$this->db->insert('definition_index', $index);
		}
	}
 
	// --------------------------------------------------------------------

	function get_words($definition_id)
	{
		// get the main recipe record
		$sql = 'SELECT entry_word, definition, keywords '.
             'FROM definitions '.
             'WHERE id = '.$definition_id;
		$query = $this->db->query($sql);
		$result = $query->row_array();
      
		// weight the Definition accordingly
		$raw_text = str_repeat(' '.strip_tags($result['definition']), $this->definition_weight);
 
		// weight the EntryWord accordingly
		$raw_text .= str_repeat(' '.$result['entry_word'], $this->word_weight);

		// weight the Keywords accordingly
		$raw_text .= str_repeat(' '.strip_tags($result['keywords']), $this->keyword_weight);

		// stem the resulting phrase
		$stemmed_words = $this->stem_phrase($raw_text);

		// unique words with weight
		$words = array_count_values($stemmed_words);

		return $words;
	}

	// --------------------------------------------------------------------

	/**
	 * Converts a phrase into an array of stemmed words for indexing
	 */
	public function stem_phrase($phrase)
	{
		$this->load->library('Stemmer');
      
		// split into words
		$words = str_word_count(strtolower($phrase), 1);

		// ignore stop words
		$words = $this->remove_stop_words_from_array($words);

		// stem words
		$stemmed_words = array();
		foreach ($words as $word)
		{
			// ignore 1 and 2 letter words
//			if (strlen($word) <= 2)
//			{
//				continue;
//			}
			$stemmed_words[] = $this->stemmer->stem($word, TRUE);
		}
		return $stemmed_words;
	}

	// --------------------------------------------------------------------

	/**
	 * Removes common words from a phrase before stemming.
	 *
	 * This list is not definitive; there may be a better list that we
	 * can use, but this will do for now.
	 *
	 */
	public function remove_stop_words_from_array($words)
	{
		$stop_words = array('i', 'me', 'my', 'myself', 'we', 'our', 'ours', 'ourselves', 'you', 'your', 'yours', 'yourself', 'yourselves', 'he', 'him', 'his', 'himself', 'she', 'her', 'hers', 'herself', 'it', 'its', 'itself', 'they', 'them', 'their', 'theirs', 'themselves', 'what', 'which', 'who', 'whom', 'this', 'that', 'these', 'those', 'am', 'is', 'are', 'was', 'were', 'be', 'been', 'being', 'have', 'has', 'had', 'having', 'do', 'does', 'did', 'doing', 'a', 'an', 'the', 'and', 'but', 'if', 'or', 'because', 'as', 'until', 'while', 'of', 'at', 'by', 'for', 'with', 'about', 'against', 'between', 'into', 'through', 'during', 'before', 'after', 'above', 'below', 'to', 'from', 'up', 'down', 'in', 'out', 'on', 'off', 'over', 'under', 'again', 'further', 'then', 'once', 'here', 'there', 'when', 'where', 'why', 'how', 'all', 'any', 'both', 'each', 'few', 'more', 'most', 'other', 'some', 'such', 'no', 'nor', 'not', 'only', 'own', 'same', 'so', 'than', 'too', 'very', );

		return array_diff($words, $stop_words);
	}

}

/* End of file Indexes_model.php */
/* Location: /application/models/Indexes_model.php */
