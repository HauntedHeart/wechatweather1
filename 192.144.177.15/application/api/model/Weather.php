<?
namespace app\api\model;

use think\Model;
use think\Db;

class Weather extends Model
{
  public function getWeather($code=101010100)
  {
    $res=Db::name('weather')->where('code',$code)->select();
    return $res;
  }
  
  public function gerWeatherList()
  {
    $res=Db::name('weather')->select();
    return $res;
  }
}