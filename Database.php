<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.02.2019
 * Time: 15:08
 */

namespace PDO;

use PDO;


class Database
{
    private $pdo;

    /**
     * @return mixed
     */
    public function connect()
    {
        $config = include('config_db.php');

        $this->pdo = new PDO(
            'mysql:host=' . $config['host'] . ';' . 'charset=utf8;dbname='
            . $config['db_name'], $config['username'], $config['password']
        );
    }

    /**
     * @return mixed
     */
    public function getClients($product_ids, $start_date, $end_date)
    {
        $result = [];

        $product_ids = implode(',', $product_ids);

        $query = "
        SELECT COUNT(orders.id) AS orders_amount, clients.name, max_price FROM clients 
        INNER JOIN orders ON orders.clients_id = clients.id 
        LEFT JOIN (SELECT products.order_id, SUM(products.price * products.count) 
        AS max_price FROM products WHERE products.id IN ($product_ids) 
        GROUP BY products.order_id) AS products ON orders.id = products.order_id 
        WHERE orders.ctime >= $start_date AND orders.ctime <= $end_date 
        GROUP BY clients.id ORDER BY max_price DESC
        ";

        $sql = $this->pdo->query($query);

        if ($sql) {
            $result = $sql->fetchAll();
        }

        return $result;
    }
}