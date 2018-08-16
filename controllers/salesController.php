<?php
class salesController extends controller 
{
	public function __construct()
	{
		$u = new Users();
		if($u->isLogged() == false){
			header("Location: ".BASE_URL."/login");
			exit;
		}
	}

	public function index() 
	{
		$data = [];
		$u = new Users();
		$u->setLoggedUser();
		$c = new Companies($u->getCompany());
		$data['company_name'] = $c->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('sales.view')){
			$s = new Sales();
			$offset = 0;
			$data['sales_list'] = $s->getList($offset, $u->getCompany());
			$this->loadTemplate('sales', $data);
		} else {
			header("Location: ".BASE_URL);
			exit;
		}
	}

	public function add()
	{
		$data = [];
		$u = new Users();
		$u->setLoggedUser();
		$c = new Companies($u->getCompany());
		$data['company_name'] = $c->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('sales.edit')){
			$s = new Sales();
			if(isset($_POST['client_id']) && !empty($_POST['client_id'])){
				$client_id = addslashes($_POST['client_id']);
				$price = addslashes($_POST['price']);
				$status = addslashes($_POST['status']);

				$price = str_replace('.', '', $price);
				$price = str_replace(",", ".", $price);
				
				$s->addSale($u->getCompany(), $client_id, $u->getId(), $price, $status);
				header("Location: ".BASE_URL."/sales");
			}
			$this->loadTemplate('sales_add', $data);
		} else {
			header("Location: ".BASE_URL);
			exit;
		}
	}
}