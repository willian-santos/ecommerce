<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Category extends Model{

	public static function listAll(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

	}

	public function save(){

		$sql = new Sql();
		
		$results = $sql->select("CALL sp_categories_save(:idcategory, :pdescategory)",array(
			"idcategory"=>$this->getidcategory(),
			":pdescategory"=>$this->getdescategory()
		));

		$this->setData($results[0]);
	}

	public function get($idcategory){
		
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(":idcategory"=>$idcategory));

		$this->setData($results[0]);
	}

	public function update(){

		$sql = new Sql();
		
		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",array(
			":iduser"=>$this->getiduser(),
			":desperson"=>$this->getdesperson(),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>$this->getdespassword(),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);
	}

	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
			"idcategory"=>$this->getidcategory()
		]);
		
	}
}

?>