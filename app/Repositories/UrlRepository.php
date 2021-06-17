<?php
/**
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-17 23:41:52
 * @modify date 2021-06-17 23:41:52
 * @desc [description]
*/

namespace App\Repositories;

use App\Models\Url;
use App\Repositories\Interfaces\UrlRepositoryInterface;

class UrlRepository implements UrlRepositoryInterface
{

    private $model;

    /**
     * This function will return the model
     *
     */
    public function __construct(Url $model) {
       $this->model = $model;
    }

    public function all() {
        return $this->model->latest()->paginate(10);
    }

    public function create($url)
    {
        // Generate Code
        return $this->model->create();
    }

}