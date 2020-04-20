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

        public function saveOrder($customer, $order, $cart) {
            
            $this->db->transStart();
            $order['customer_id'] = $this->saveCustomer($customer);
            if (isset($customer['id'])) {
                $order['customer_id'] = $customer['id']; 
            }
            $this->save($order);
            $orderid = $this->insertID();
            $this->saveOrderdetail($orderid, $cart);
            $this->db->transComplete();

            if ($this->transStatus() === FALSE) {
                $this->db->transRollback();
                return null;
            } else {
                return $orderid;
            }

        }

        //Saves customer to database
        private function saveCustomer($customer){
            
            $customermodel = new CustomerModel();
            $customermodel->save($customer);
            return $this->insertID();
        }

        //Saves Order details to database
        private function saveOrderdetail($orderid, $cart){
            $orderdetailmodel = new OrderdetailModel();
            foreach ($cart as $item => $value) {
                $orderdetailmodel->save([
                    'product_id' => $item,
                    'order_id' => $orderid,
                    'amount' => $value
                ]);
            }
        }

}
    
