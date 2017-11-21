<?php
/**
 *
 * Copyright (c) 2015-Present, mandalorien
 * All rights reserved.
 *
 * create 2015 by mandalorien
 */

class Classes
{
	private $_PDO;
	private $_NumbersTables = 0;
	private $_Table;
	private $_ListTables = array();
	
	
	public function __construct($connexion){
		$this->_PDO = $connexion;
	}
	
	public function set_Table($table){
		$this->_Table = $table;
	}
	
	public function get_ListTables(){
		return $this->_ListTables;
	}
	
	public function write_class($database,$constructeur = false){
		
		// methods list table
		$this->list_tables($database);
		if(in_array($this->_Table,$this->_ListTables)){

			####	DAL/REQUESTS/TABLES/....	####

			$parsedalRequestsTables = null;
			$ParseConst['name'] = strtoupper('NAME_TABLE');
			$ParseConst['value'] = strtolower($this->_Table);
			$construct = Page::construirePagePartielle('classes/attributes/constant',$ParseConst). PHP_EOL;
			
			$ParseConst['name'] = strtoupper('NAME_CLASS');
			$ParseConst['value'] = ucfirst(strtolower($this->_Table));
			$construct .= Page::construirePagePartielle('classes/attributes/constant',$ParseConst). PHP_EOL . PHP_EOL;
			
			if($constructeur){
				$ParseMethodsConstruct['varMethods'] = '';
				$ParseMethodsConstruct['Method'] = '';
				$methods =Page::construirePagePartielle('classes/methods/construct',$ParseMethodsConstruct). PHP_EOL;
			}else{
				$methods = null;
			}

			foreach($this->list_columns() as $columns){
				// attributes
				
				$ParseConst['name'] = strtolower($columns->Field);
				$ParseConst['value'] = strtolower($columns->Field);
				
				$construct .= Page::construirePagePartielle('classes/attributes/constant',$ParseConst). PHP_EOL;

				$ParseAttrib['name'] = ucfirst(strtolower($columns->Field));
			}

			$parsedalRequestsTables['nameclass'] = 'T_'.ucfirst(strtolower($this->_Table));
			$parsedalRequestsTables['methods'] = $methods;
			$parsedalRequestsTables['attributes'] = $construct;
			$dalRequestsTables = Page::construirePagePartielle('classes/corp',$parsedalRequestsTables);

			####	DAL/DAOS/....	####

			$parsedalDaos = null;
			if($constructeur){
				$ParseMethodsConstruct['varMethods'] = '';
				$ParseMethodsConstruct['Method'] = '';
				$methods =Page::construirePagePartielle('classes/methods/construct',$ParseMethodsConstruct). PHP_EOL;
			}else{
				$methods = null;
			}

			
			$ParseMethod['attributes'] = null;
			$ParseMethod['nameMethod'] = 'add';
			$ParseMethod['varMethods'] = '$obj';
			$ParseMethod['Method'] = '(new SQLInsert'.ucfirst(strtolower($this->_Table)).'($obj))->write();';

			$methods .= Page::construirePagePartielle('classes/methods/public_static',$ParseMethod). PHP_EOL;
			
			$ParseMethod['attributes'] = null;
			$ParseMethod['nameMethod'] = 'delete';
			$ParseMethod['varMethods'] = '$id';
			$ParseMethod['Method'] = '';

			$methods .= Page::construirePagePartielle('classes/methods/public_static',$ParseMethod). PHP_EOL;
			
			$ParseMethod['attributes'] = null;
			$ParseMethod['nameMethod'] = 'selectAll';
			$ParseMethod['varMethods'] = '';
			$ParseMethod['Method'] = ' return (new SQLSelect'.ucfirst(strtolower($this->_Table)).'())->read();';

			$methods .= Page::construirePagePartielle('classes/methods/public_static',$ParseMethod). PHP_EOL;
			
			$ParseMethod['attributes'] = null;
			$ParseMethod['nameMethod'] = 'selectById';
			$ParseMethod['varMethods'] = '$id';
			$ParseMethod['Method'] = '';

			$methods .= Page::construirePagePartielle('classes/methods/public_static',$ParseMethod). PHP_EOL;
			
			$ParseMethod['attributes'] = null;
			$ParseMethod['nameMethod'] = 'update';
			$ParseMethod['varMethods'] = '$obj, $id';
			$ParseMethod['Method'] = '';

			$methods .= Page::construirePagePartielle('classes/methods/public_static',$ParseMethod). PHP_EOL;

			$parsedalDaos['nameclass'] = ucfirst(strtolower($this->_Table)).'DAO';
			$parsedalDaos['parentclass'] = 'DataAccessModel';
			$parsedalDaos['methods'] = $methods;
			$parsedalDaos['attributes'] = null;
			$dalDaos = Page::construirePagePartielle('classes/corp_extends',$parsedalDaos);

			####	CLASSES/....	####

			$parseclasse = null;
			$construct = null;
			
			if($constructeur){
				$ParseMethodsConstruct['varMethods'] = '';
				$ParseMethodsConstruct['Method'] = '';
				$methods =Page::construirePagePartielle('classes/methods/construct',$ParseMethodsConstruct). PHP_EOL;
			}else{
				$methods = null;
			}
			
			foreach($this->list_columns() as $columns){
				// attributes
				
				$ParseAttrib['name'] = strtolower($columns->Field);
				
				/****
				if($columns->Key == 'PRI'){
					$construct .= Page::construirePagePartielle('classes/attributes/protected',$ParseAttrib). PHP_EOL;
				}else{
					$construct .= Page::construirePagePartielle('classes/attributes/public',$ParseAttrib). PHP_EOL;
				}
				***/
				$construct .= Page::construirePagePartielle('classes/attributes/public',$ParseAttrib). PHP_EOL;
				$construct .= PHP_EOL;
			}
			
			$parseclasse['nameclass'] = ucfirst(strtolower($this->_Table));
			$parseclasse['methods'] = $methods;
			$parseclasse['attributes'] = $construct;
			$classe = Page::construirePagePartielle('classes/corp',$parseclasse);
			
			//on s'occupe des création
			if(!file_exists(UNIGUERRE_DIR_MODELS . DIRECTORY_SEPARATOR . ucfirst(strtolower($this->_Table)).'.php')){
				file_put_contents(UNIGUERRE_DIR_MODELS  . ucfirst(strtolower($this->_Table)).'.php', $classe);
			}
			
			if(!file_exists(UNIGUERRE_DIR_DAL . 'daos'. DIRECTORY_SEPARATOR  . ucfirst(strtolower($this->_Table)).'DAO.php')){
				file_put_contents(UNIGUERRE_DIR_DAL  . 'daos'. DIRECTORY_SEPARATOR  . ucfirst(strtolower($this->_Table)).'DAO.php', $dalDaos);
			}
			
			if(!file_exists(UNIGUERRE_DIR_DAL  . 'requests/tables'. DIRECTORY_SEPARATOR  .ucfirst(strtolower($this->_Table)).'DAO.php')){
				file_put_contents(UNIGUERRE_DIR_DAL  . 'requests/tables'. DIRECTORY_SEPARATOR  .'T_'.ucfirst(strtolower($this->_Table)).'.php', $dalRequestsTables);
			}
		}else{
			return false;
		}
	}
	
	public function read_class(){
	}
	

	public function list_tables($database){
		$SQL  = "SHOW TABLES FROM " . $database;
		foreach($REQ = $this->_PDO->query($SQL) as $count => $tables){
			$tables[0] = preg_replace('/'. PREFIXTB .'/','',$tables[0]);
			array_push($this->_ListTables,$tables[0]);
			$this->_NumbersTables ++;
		}
		$REQ->CloseCursor();
	}
	
	private function list_columns(){
		$SQL  = "SHOW COLUMNS FROM " . PREFIXTB . $this->_Table;
		return $this->_PDO->query($SQL)->fetchAll(PDO::FETCH_OBJ);
	}
	
	private function List_Methods($nameclass)
	{
		$class = new ReflectionClass($nameclass);
		return $methods = $class->getMethods();
	}
	
	private function List_Constants($nameclass)
	{
		$class = new ReflectionClass($nameclass);
		return $class->getConstants();
	}
	
	private function List_properties($nameclass)
	{
		$class = new ReflectionClass($nameclass);
		return $properties = $class->getProperties(ReflectionProperty::IS_PUBLIC);
	}
	
	private function Control_Methods($nameclass,$constante)
	{
		$class = new ReflectionClass($nameclass);
		return $class->hasConstant($constante);
	}
	
	private function Control_Constant($nameclass,$methods)
	{
		$class = new ReflectionClass($nameclass);
		return $class->hasMethod($methods);
	}
	
	private function Control_Property($nameclass,$property)
	{
		$class = new ReflectionClass($nameclass);
		return $class->hasProperty($property);
	}
	// http://php.net/manual/fr/reflectionclass.getdoccomment.php
}
?>