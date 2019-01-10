<?php
class Autocompletar
{

	private $dbh;

	public function __construct()
	{
		$this->dbh = new PDO("mysql.hostinger.com.ar","u338686486_globa","u338686486_globu","global305");
	}

	public function findData($search)
	{
		$query = $this->dbh->prepare("SELECT CodiPers, NombPers FROM persona WHERE NombPers LIKE :search");
        $query->execute(array(':search' => '%'.$search.'%'));
        $this->dbh = null;
        if($query->rowCount() > 0)
        {
        	echo json_encode(array('res' => 'full', 'data' => $query->fetchAll()));
        }
        else
        {
        	echo json_encode(array('res' => 'empty'));
        }
	}
}