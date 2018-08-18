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

	public function addSale($id_company, $id_client, $id_user, $quant, $status)
	{
		$i = new Inventory();
		$stmt = $this->conn->prepare("INSERT INTO sales(id_client, id_user, date_sale, total_price, id_company, status) VALUES(:ID_CLIENT, :ID_USER, NOW(), :TOTAL_PRICE, :ID_COMPANY, :STATUS)");
		$stmt->bindParam(":ID_CLIENT", $id_client);
		$stmt->bindParam(":ID_USER", $id_user);
		$stmt->bindValue(":TOTAL_PRICE", '0');
		$stmt->bindParam(":STATUS", $status);
		$stmt->bindParam(":ID_COMPANY", $id_company);
		$stmt->execute();

		$id_sale = $this->conn->lastInsertId();

		$total_price = 0;
		foreach($quant as $id_prod => $quant_prod){
			$stmt = $this->conn->prepare("SELECT price FROM inventory WHERE id = :ID AND id_company = :ID_COMPANY");
			$stmt->bindParam(":ID", $id_prod);
			$stmt->bindParam(":ID_COMPANY", $id_company);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$row = $stmt->fetch();
				$price = $row['price'];
				$stmt = $this->conn->prepare("INSERT INTO sales_products(id_company, id_sale, id_product, quantity, sale_price) VALUES(:ID_COMPANY, :ID_SALE, :ID_PRODUCT, :QUANTITY, :SALE_PRICE)");
				$stmt->bindParam(":ID_COMPANY", $id_company);
				$stmt->bindParam(":ID_SALE", $id_sale);
				$stmt->bindParam(":ID_PRODUCT", $id_prod);
				$stmt->bindParam(":QUANTITY", $quant_prod);
				$stmt->bindParam(":SALE_PRICE", $price);
				$stmt->execute();

				$total_price += $price * $quant_prod;
				$i->decrease($id_prod, $quant_prod, $id_company, $id_user);
			}
		}

		$stmt = $this->conn->prepare("UPDATE sales SET total_price = :TOTAL_PRICE WHERE id = :ID AND id_company = :ID_COMPANY");
		$stmt->bindParam(":TOTAL_PRICE", $total_price);
		$stmt->bindParam(":ID", $id_sale);
		$stmt->bindParam(":ID_COMPANY", $id_company);
		$stmt->execute();
	}

	public function getInfo($id, $id_company)
	{
		$array = [];
		$stmt = $this->conn->prepare("SELECT *, (select clients.name from clients where clients.id = sales.id_client) as client_name FROM sales WHERE id = :ID AND id_company = :ID_COMPANY");
			$stmt->bindParam(":ID", $id);
			$stmt->bindParam(":ID_COMPANY", $id_company);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$array['info'] = $stmt->fetch();
			}
			$stmt = $this->conn->prepare("SELECT sales_products.quantity, sales_products.sale_price, inventory.name FROM sales_products LEFT JOIN inventory ON inventory.id = sales_products.id_product WHERE sales_products.id_sale = :ID_SALE AND sales_products.id_company = :ID_COMPANY");
			$stmt->bindParam(":ID_SALE", $id_sale);
			$stmt->bindParam(":ID_COMPANY", $id_company);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$array['products'] = $stmt->fetchAll();
			}
			return $array;
	}
}
