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
            $builder->select("orders.id as id, status, orderDate, customer_id, delivery, customer.id as customerid, firstname, lastname");
            $builder->join("Customer", "orders.customer_id = customer.id", "inner");
            $query = $builder->get();
            return $query->getResultArray();
        }
        public function getOrderDetails($id) {
            $builder = $this->table("orders");
            $builder->select("orders.id, product.name, amount AS määrä, price, type, status,firstname,lastname,phone, address, postcode, town, email, delivery");
            $builder->join("Customer", "orders.customer_id = customer.id", "inner");
            $builder->join("orderdetail", "orders.id = orderdetail.order_id", "inner");
            $builder->join("product","orderdetail.product_id = product.id");
            $builder->where('orderdetail.order_id',$id);
            $query = $builder->get();
            return $query->getResultArray();
        }
        public function getOrderStatus($id) {
            $builder = $this->table('orders');
            $builder->select('status,id',$id);
            $query = $this->get();
            return $query->getResultArray();
        }
        public function SortOrders($data) {
            $builder = $this->table("orders");
            $builder->select("orders.id as id, status, orderDate, customer_id, delivery, customer.id as customerid, firstname, lastname");
            $builder->join("Customer", "orders.customer_id = customer.id", "inner");
            $builder->where('status', $data);
            $query = $builder->get();
            return $query->getResultArray();
        }
public function SortOrdersbyMonth($data) {
            $builder = $this->table("orders");
            $builder->select("orders.id as id, status, MONTH(orderDate), orderDate, customer_id, delivery, customer.id as customerid, firstname, lastname");
            $builder->join("Customer", "orders.customer_id = customer.id", "inner");
            $builder->where('MONTH(orderDate)', $data);
            $query = $builder->get();
            return $query->getResultArray();
        }
        //Returns last order's id number
        public function getOrderId() {
            $builder = $this->table("orders");
            $builder->select("max(id)");
            $query = $builder->get();

            return $query->getResultArray();
        }
}
    
