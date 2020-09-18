<?php
class Base_Model extends CI_Model  
{

	function get_datatables($table, $type = 'auto', $condition = array(), $columns = array(), $order = array())
	{
		
		if($type == 'custom')
		{
			$query_str = $this->_get_datatables_customquery($table, $columns, $order);
			
			$queryall = $this->db->query($query_str);
			$this->numrows = $this->db->affected_rows();
			if($_POST['length'] != -1)
			$query_str = $query_str . ' LIMIT '.$_POST['start'] .','. $_POST['length'];
		
			$query = $this->db->query($query_str);
		}
		else if($type == 'customnew')
		{
			$query_str = $this->_get_datatables_customquery_new($table, $columns, $order);
			//echo $query_str;die();
			$queryall = $this->db->query($query_str);
			$this->numrows = $this->db->affected_rows();
			if($_POST['length'] != -1)
			$query_str = $query_str . ' LIMIT '.$_POST['start'] .','. $_POST['length'];
		
			$query = $this->db->query($query_str);
		}
		else if($type == 'complex')
		{
			$this->_get_datatables_query_complex($table, $condition, $columns, $order);
			$queryall = $this->db->get();
			$this->numrows = $this->db->affected_rows();
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			
		}
		else
		{
			$this->_get_datatables_query($table, $condition, $columns, $order);
			//neatPrint($columns);
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
		}		
		$this->db->flush_cache();
		
		return $query->result();
	}
	private function _get_datatables_customquery($query, $columns = array(), $order = array())
	{	
		$i = 0;
		$column = array();
		$str = '';
		foreach ($columns as $item) 
		{
			if($_POST['search']['value'])
			($i===0) ? $str .= ' AND ('.$item . ' LIKE "%' . $_POST['search']['value'] . '%"' : $str .= ' OR '.$item . ' LIKE "%'.$_POST['search']['value'].'%"';
			$column[$i] = $item;
			$i++;
		}
		if($str != '')
			$str .= ')';
		
		//Colums Searching Start
		$column_search = FALSE;
		$p = 0;
		foreach ($columns as $item) 
		{
			if(isset($_POST['columns'][$p]['search']['value']) && $_POST['columns'][$p]['search']['value'] != '') $column_search = TRUE;
			$p++;
		}
		if($column_search == TRUE)
		{
			$p = 0;		
			foreach ($columns as $item) 
			{
			if(isset($_POST['columns'][$p]['search']['value']) && $_POST['columns'][$p]['search']['value'] != '')
				$str .= ' AND '.$item . ' = ' . $this->getStringBetween(urldecode($_POST['columns'][$p]['search']['value']), '^', '$');	
			$p++;
			}
		}
		//Colums Searching End
		
		 
		if(count($order) > 0)
		{
			$order = $order;
			$str .= ' ORDER BY tds.' . key($order) . ' ' . $order[key($order)];
		}
		elseif(isset($_POST['order']))
		{
			$str .= ' ORDER BY tds.' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		}
		return 	$query . $str;	
	}
	private function _get_datatables_customquery_new($query, $columns = array(), $order = array())
	{	
		$i = 0;
		$column = array();
		$str = '';
		foreach ($columns as $item) 
		{
			if($_POST['search']['value'])
			($i===0) ? $str .= ' AND ('.$item . ' LIKE "%' . $_POST['search']['value'] . '%"' : $str .= ' OR '.$item . ' LIKE "%'.$_POST['search']['value'].'%"';
			$column[$i] = $item;
			$i++;
		}
		if($str != '')
			$str .= ')';
		
		//Colums Searching Start
		$column_search = FALSE;
		$p = 0;
		foreach ($columns as $item) 
		{
			if(isset($_POST['columns'][$p]['search']['value']) && $_POST['columns'][$p]['search']['value'] != '') $column_search = TRUE;
			$p++;
		}
		if($column_search == TRUE)
		{
			$p = 0;		
			foreach ($columns as $item) 
			{
			if(isset($_POST['columns'][$p]['search']['value']) && $_POST['columns'][$p]['search']['value'] != '')
				$str .= ' AND '.$item . ' = ' . $this->getStringBetween(urldecode($_POST['columns'][$p]['search']['value']), '^', '$');	
			$p++;
			}
		}
		//Colums Searching End


		if(count($order) > 0)
		{
			$order = $order;
			$str .= ' ORDER BY ' . key($order) . ' ' . $order[key($order)];
		}
		elseif(isset($_POST['order']))
		{
			$str .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		}
		return 	$query . $str;	
	}

	function insertCreation($inputdata,$table){
		$result  = $this->db->insert($table, $inputdata);
		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	function fetch_records( $table, $condition = '',$select = '*', $order_by = '',$order_type='asc',$limit='' )
	{		
		$this->db->select($select, FALSE);
		$this->db->from(  $table  );
		if( !empty( $condition ) )			
			$this->db->where( $condition );
		
		if( !empty( $order_by ) )			
			$this->db->order_by( $order_by, $order_type );				
		
		if(!empty( $limit) )			
			$this->db->limit( $limit );

		$result = $this->db->get();

		return $result->result();

	}
	function update_operation( $inputdata, $table, $where )
	{
		$result  = $this->db->update($table,$inputdata, $where);
		return $result;
	}

}
?>