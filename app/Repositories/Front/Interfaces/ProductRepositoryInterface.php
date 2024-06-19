<?php

namespace App\Repositories\Front\Interfaces;

interface ProductRepositoryInterface
{
    public function findAll($options = []);
    public function findByID($id);
}