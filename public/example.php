<?php

use Movavi\Builder\AverageRateBuilder;
use Movavi\Factory\CurrencyServiceFactory;
use Movavi\Service\CbrService;
use Movavi\Service\RbcService;

require "../vendor/autoload.php";

$date = new \DateTime();

$serviceFactory = new CurrencyServiceFactory();
$averageRateBuilder = new AverageRateBuilder();

$rbcService = $serviceFactory->createService(RbcService::NAME);
$cbrService = $serviceFactory->createService(CbrService::NAME);



/**
 * Getting rates manually
 * Uncomment string you want
 */
//print_r($rbcService->getUsdToRubRate($date));
//print_r($rbcService->getEurToRubRate($date));
//
//print_r($cbrService->getUsdToRubRate($date));
//print_r($cbrService->getEurToRubRate($date));



/**
 * Getting average rates
 * (cbr.ru is working not good!!!)
 *
 */
//$usdRates = [];
//$usdRates[] = $rbcService->getUsdToRubRate($date);
//$usdRates[] = $cbrService->getUsdToRubRate($date);
//
//$averageUsdRate = $averageRateBuilder->fromArray($usdRates);
//printf("Average USD rate: %s<br>", $averageUsdRate->getRate());
//
//$eurRates = [];
//$eurRates[] = $rbcService->getEurToRubRate($date);
//$eurRates[] = $cbrService->getEurToRubRate($date);
//
//$averageUsdRate = $averageRateBuilder->fromArray($eurRates);
//printf("Average EUR rate: %s<br>", $averageUsdRate->getRate());

