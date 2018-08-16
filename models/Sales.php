<?php
class Sales extends model 
{
	public function getList($offset, $id_company)
	{
		$array = [];
		$stmt = $this->conn->prepare("SELECT sales.id, sales.date_sale, sales.total_price, sales.status, clients.name FROM sales LEFT JOIN clients ON clients.id = sales.id_client WHERE sales.id_company = :ID_COMPANY ORDER BY sales.date_sale DESC LIMIT $offset, 10");
		$stmt->bindParam(":ID_COMPANY", $id_company);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function addSale($id_company, $id_client, $id_user, $price, $status)
	{
		$stmt = $this->conn->prepare("INSERT INTO sales(id_client, id_user, date_sale, total_price, id_company, status) VALUES(:ID_CLIENT, :ID_USER, NOW(), :PRICE, :ID_COMPANY, :STATUS)");
		$stmt->bindParam(":ID_CLIENT", $id_client);
		$stmt->bindParam(":ID_USER", $id_user);
		$stmt->bindParam(":PRICE", $price);
		$stmt->bindParam(":STATUS", $status);
		$stmt->bindParam(":ID_COMPANY", $id_company);
		$stmt->execute();
	}
}
