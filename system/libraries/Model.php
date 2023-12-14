<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2010, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
 define('RECOMMEND_YES',1);
 define('RECOMMEND_NO',0);
class Model {

	var $_parent_name = '';
	const SAVE_INSERT = -1;

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function Model()
	{
		// If the magic __get() or __set() methods are used in a Model references can't be used.
		$this->_assign_libraries( (method_exists($this, '__get') OR method_exists($this, '__set')) ? FALSE : TRUE );
		
		// We don't want to assign the model object to itself when using the
		// assign_libraries function below so we'll grab the name of the model parent
		$this->_parent_name = ucfirst(get_class($this));
		
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * Assign Libraries
	 *
	 * Creates local references to all currently instantiated objects
	 * so that any syntax that can be legally used in a controller
	 * can be used within models.  
	 *
	 * @access private
	 */	
	function _assign_libraries($use_reference = TRUE)
	{
		$CI =& get_instance();				
		foreach (array_keys(get_object_vars($CI)) as $key)
		{
			if ( ! isset($this->$key) AND $key != $this->_parent_name)
			{			
				// In some cases using references can cause
				// problems so we'll conditionally use them
				if ($use_reference == TRUE)
				{
					$this->$key = NULL; // Needed to prevent reference errors with some configurations
					$this->$key =& $CI->$key;
				}
				else
				{
					$this->$key = $CI->$key;
				}
			}
		}		
	}
	
	public function init($options) {
		$this->key = $options['key'];
		$this->table = $options['table'];
		$this->columns = $options['columns'];
		/*
		foreach ($this->columns as $objCol => $dbCol) {
			$o->$objCol = null;
		}
		return $o;
		*/
	}
	
	public function field(){
        $o = new stdClass();
		foreach ($this->columns as $objCol => $dbCol) {
			$o->$objCol = $this->$objCol;
		}
		return $o;
	}
	
	public function find($where = array(),$options = array()) {
		$result = array();
		$w = 'WHERE 1=1 ';
		$columns = $this->columns;
		foreach($where as $k => $v){
			$w .= " AND `{$columns[$k]}` {$v}";
		}
		if(!isset($options['order']['id'])) $options['order']['id'] = 'DESC';
		if (isset($options['order']) && is_array($options['order'])) {
			$ords = array();
			foreach ($options['order'] as $objcol => $sort)
				$ords[] = "`{$objcol}` {$sort}";
			$order = strtr(" ORDER BY " . implode(', ', $ords), $columns);
			$w .= $order;
		}
		if(isset($options['limit'])) $w .= " LIMIT {$options['limit']} ";
		$sql = "SELECT * FROM {$this->table} $w";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
            $o = new stdClass();
			foreach($query->result_array() as $row){
				foreach ($this->columns as $objCol => $dbCol) {
					$o->$objCol = $row[$dbCol];
				}
				
				$result[] = clone $o;
			}
		}
		return $result;
	}
	
	public function load($id = NULL){
		if(is_null($id)) return null;
		$key = $this->key;
		$sql = "SELECT * FROM {$this->table} WHERE {$this->columns[$key]} = $id";
		$query = $this->db->query ($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$o = new stdClass();
			foreach ($this->columns as $objCol => $dbCol) {
				$o->$objCol = $row[$dbCol];
			}
			return $o;
		} else {
			return null;
		}
	}
	public function save($obj,$flag = false){
		$key = $this->key;
		if (strlen($obj->$key) === 0 || Model::SAVE_INSERT === $flag) {
			$this->insert($obj);
		} else {
			$this->update($obj);
		}
		
	}
	public function insert($obj){
		$columns = $this->columns;
		$cols = $vals =  array();
		foreach ($columns as $objcol => $dbcol) {
			if (isset($obj->$objcol)) {
				$key = $this->key;
				if(!$obj->$objcol && $objcol == $this->key) continue;
				$cols[] = "`{$dbcol}`";
				$value = mysql_real_escape_string($obj->$objcol);
				$vals[] = "'{$value}'";
			}
			/**
			if($objcol == 'createTime'){
				$cols[] = "`{$dbcol}`";
				$vals[] = "'".time()."'";
			}
             * */
		}
		$colstr = implode(', ', $cols);
		$valstr = implode(', ', $vals);
		$sql = "INSERT INTO {$this->table} ({$colstr}) VALUES ({$valstr})";
		$this->db->query ($sql);
  		$id = $this->db->insert_id ();
		return $id;
	} 
	
	public function update($obj){
		$key = $this->key;
		$sets = array();
		$columns = $this->columns;
		foreach ($columns as $objcol => $dbcol) {
			if ($objcol == $key) continue;
			if(isset($obj->$objcol)){
				$value = mysql_real_escape_string($obj->$objcol);
				$sets[] = "`{$dbcol}` = '{$value}'";
			}
			# if($objcol == 'updateTime') $sets[] = "`{$dbcol}` = '".time()."'";
		}
		$setstr = implode(', ', $sets);
		$where = "`{$columns[$key]}` = '{$obj->$key}'";
		$sql = "UPDATE {$this->table} SET {$setstr} WHERE {$where}";
		$this->db->query ($sql);
	}
	
	public function delete($val = null) {
		$key = $this->key;
		$columns = $this->columns;
		$where = "WHERE {$columns[$key]} = '{$val}'";
		$sql = "DELETE FROM {$this->table} {$where} LIMIT 1";
		$this->db->query ($sql);
	}
	
	public function count($options = array()) {
		if (!is_array($options)) {
			$options = array();
		}
		$w = 'WHERE 1=1 ';
		$columns = $this->columns;
		foreach($options as $k => $v){
			$w .= " AND `{$columns[$k]}` {$v}";
		}
		$sql = "SELECT COUNT(*) AS count FROM {$this->table} $w";

		$result = $this->db->query ($sql);
		if ($result->num_rows() > 0) {
			$data = $result->row_array();
  			return $data['count'];
		}
		return 0;
	}

}
// END Model Class

/* End of file Model.php */
/* Location: ./system/libraries/Model.php */