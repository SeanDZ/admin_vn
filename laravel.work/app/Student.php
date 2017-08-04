<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;
    public $table='student';
    public $timestamps=false;
    protected $guarded=[];
    protected function getDateFormat()
    {
        return time();
    }
    protected function asDateTime($value)
    {
        return $value;
    }
    function sex($key=null)
    {
        $array=[
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女',
        ];
        if($key!==null){
            return array_key_exists($key,$array)?$array[$key]:$array[self::SEX_UN];
        }
        return $array;
    }
}