<?php namespace App\Models;

use CodeIgniter\Model;

    class OrderModel extends Model
    {
        protected $table     = 'orders';
        protected $primaryKey = 'id';
        protected $returnType = 'array';

        protected $allowedFields = ['status', 'orderDate', 'customer_id', 'delivery'];

        public function getOrders() {

            $builder = $this->table("orders");
            $builder->select("orders.id as id, status, orderDate, customer_id, delivery, customer.id as customerid, firstname, lastname, address, postcode, town, email, phone");
            $builder->join("Customer", "orders.id = customer.id", "inner");
            $query = $builder->get();
            return $query->getResultArray();
        }
        public function getOrderDetails($id) {
            $builder = $this->table("orders");
            $builder->select("orders.id, product.name, amount AS määrä, price as Hinta yhteensä");
            $builder->join("orderdetail", "orders.id = orderdetail.order_id", "inner");
            $builder->join("product","orderdetail.product_id = product.id");
            $builder->where('orders.id',$id);
            $query = $builder->get();
            return $query->getResultArray();
        }

        //Returns last order's id number
        public function getOrderId() {
            $builder = $this->table("order");
            $builder->select("max(id)");
            $query = $builder->get();

            return $query->getResultArray();
        }
}
    
