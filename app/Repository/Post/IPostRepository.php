<?php

namespace App\Repository\Post;

use Illuminate\Pagination\LengthAwarePaginator;

interface IPostRepository
{
    public function paginate(?int $perPage = null, array $columns = ['*'], string $pageName = 'page', ?int $page = null): LengthAwarePaginator;
}