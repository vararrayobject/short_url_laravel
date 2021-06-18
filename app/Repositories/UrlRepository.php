<?php
/**
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-17 23:41:52
 * @modify date 2021-06-17 23:41:52
 * @desc [description]
*/

namespace App\Repositories;

use App\Http\Traits\UrlTrait;
use App\Models\Url;
use App\Repositories\Interfaces\UrlRepositoryInterface;

class UrlRepository implements UrlRepositoryInterface
{
    use UrlTrait;

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
        $randNum = mt_rand(100000000000, 999999999999);
        $shortCode = $this->generateShortCode($randNum);
        return $this->model->create(['id' => $randNum, 'code' => $shortCode, 'link' => $url['url']]);
    }

    public function generateShortCode($randNum)
    {
        $shortCode = $this->int2Radix64($randNum);
        $checkShortCode = Url::whereCode($shortCode)->first();
        if($checkShortCode)
            $this->generateShortCode();
        else
            return $shortCode;
    }

    public function findLongUrl($str)
    {
        $id = $this->radix64ToInt($str);
        return Url::find($id);
    }
}