<?php
class Notificationinq{
    use Model;
    protected $table='notifications_t';
    protected $allowedColumns=[
        'id',
        'user_id',
        'title',
        'message',
        'is_read',
        'created_at',
    ];

}