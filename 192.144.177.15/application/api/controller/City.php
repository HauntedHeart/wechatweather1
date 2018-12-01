<?
namespace app\api\controller;

use think\Controller;

class City extends Controller
{
  public function read()
  {
    $county_name=input('county_name');
    $model=model('City');
    $data=$model->getCityCode($county_name);
   // if($data){
    //  $code=200;
   // }else{
   //   $code=404;
   // }
    $data=[
      'county_name'=>$county_name,
      'data'=>$data
      ];
    return json($data);
  }
}