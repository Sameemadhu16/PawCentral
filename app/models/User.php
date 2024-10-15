<?php

class USer
{
    use Model;

    protected $table = 'users';

    protected $allowedColumns =[
        'name',
        'age',
    ];
}