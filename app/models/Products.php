<?php 
class Products{
    use Model;
    protected $table='shop_products';
    protected $order_column='product_id';
    
    protected $allowedcolumns=[
        'shop_id',
        'product_id',
        'description',
        'product_name',
        'price',
        'stock_quantity',
        'img',
        'created_at',
        'delete_status',
    ];

    public function create($data){
        $this->insert($data);
    }
}