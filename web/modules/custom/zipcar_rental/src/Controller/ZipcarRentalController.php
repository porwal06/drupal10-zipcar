<?php

namespace Drupal\zipcar_rental\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client;

class ZipcarRentalController extends ControllerBase {

  public function content() {
    return [
      '#theme' => 'zipcar_rental_list',
      '#cars' => [],
      '#attached' => [
        'library' => [
          'zipcar_rental/zipcar_rental',
        ],
      ],
    ];
  }

  public function getCars(Request $request) {
    try{
      $client = new Client();
      //get number of hours from request
      $hours = (int)$request->query->get('hours');
      $convertHoursToDaysAndHours = $this->convertHoursToDaysAndHours($hours);
            
      $days = $convertHoursToDaysAndHours['day'];
      $hours = $convertHoursToDaysAndHours['hour'];
      $response = $client->get('https://zipcar.free.beeceptor.com/reserve');
      $cars = json_decode($response->getBody(), TRUE);
      
      //Error handling if webserivce is down
      if ($cars === NULL) {
        return new JsonResponse(['error' => 'Service is down'], 500);
      }
      //transform api response to required format
      // API doesn't have full path do add images from module folder 
      $module_path = \Drupal::moduleHandler()->getModule('zipcar_rental')->getPath().'/images';
      $image_uri =  \Drupal::service('file_url_generator')->generateAbsoluteString($module_path);
      $cars = array_map(function($car) use ($image_uri, $hours, $days){
        return [
          'title' => $car['title'],
          'type' => $car['type'],
          'location' => $car['location'],
          'perHourCost' => sprintf('%0.2f',$car['perHourCost'], 2),
          'perDayCost' => sprintf('%0.2f',$car['perDayCost'],2),
          'walkingDistance' => $car['walkingDistance'],
          'image' => $image_uri.'/'.$car['image'],
          'estimate' => sprintf('%0.2f',$days*$car['perDayCost'] + $hours*$car['perHourCost'],2),
        ];
      }, $cars['vehicles']);    
      return new JsonResponse($cars);
    }
    catch(\Exception $e){
      return new JsonResponse(['error' => $e->getMessage()], 500);
    }
  }
  
  function convertHoursToDaysAndHours($totalHours) {
    $hoursPerDay = 24;
    $days = floor($totalHours / $hoursPerDay);
    $remainingHours = $totalHours % $hoursPerDay;
    
    $result = ['day' => 0, 'hour'=>0];
    if ($days > 0) {
      $result['day'] = $days;      
    }
    if ($remainingHours > 0) {
      $result['hour'] = $remainingHours;
    }    
    return  $result;    
  }
}
