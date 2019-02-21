<?php
require_once 'admin/constdata/data.php';
require_once 'shop/baseconnect_class.php';
require_once 'shop/products_class.php';
require_once 'shop/basereq_class.php';


$products = new Products();
//echo $products->db->dbname;
echo '<br/>';
//$products->GetAllProducts();
//print_r($products->sel);
echo '<br/>';
$products->GetProductByID('2');
print_r($products->sel);


//$dbj = new BaseConnect(KS_BASE, KS_BASE_US, KS_BASE_PASS);
/*try {
		    $db = new PDO("mysql:host=localhost;dbname=kinoshop", "root", "");
		    echo 'Удачное подключение!';
		} catch (PDOException $e) {
		    print "Произошла ошибка. Мы уже оповещены о ней и разбираемся в ситуации. Попробуйте зайти на сайт позже:  " . $e->getMessage() . "<br/>";
		    die();
		}


			$query = "SELECT title from sdvd_products";
			$result = $db->query($query);
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC)){
				$sel[$i] = $res; $i++;
			}
			print_r($sel);*/
			

		