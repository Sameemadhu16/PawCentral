<?php
class Inquire{
    use Model;
    protected $table='inquire';
    protected $order_column='shop_id';
    protected $allowedColumns=[
        'shop_id',
        'inquirer_id',
        'inquiry',
        'reply',
        'created_at',
    ];
    
    public function create($data){
        return $this->insert($data);
    }

    
}