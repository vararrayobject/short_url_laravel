<?php
/**
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-17
 * @modify date 2021-06-17
 * @desc [description]
 */

namespace App\Repositories\Interfaces;

use App\Models\Url;

interface UrlRepositoryInterface
{
    /**
     * all
     *
     * @return void
     */
    public function all();

    /**
     * Create Url
     *
     * @return void
     */
    public function create($url);
}