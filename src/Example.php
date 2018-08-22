<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 22:46
 */

namespace Application;

use Movavi\Builder\AverageRateBuilder;
use Movavi\Factory\CurrencyServiceFactory;
use Movavi\Service\CbrService;
use Movavi\Service\RbcService;

/**
 * Class Example
 *
 * Example of usage spendmail/movavi library
 *
 * @package Application
 */
class Example
{
    /**
     * Starts examples
     *
     * @throws \Movavi\Exception\EmptyRateListException
     * @throws \Movavi\Exception\NoneRateException
     * @throws \Movavi\Exception\UnknownServiceException
     * @throws \Movavi\Exception\WrongClassException
     */
    public function run()
    {
        $eol = php_sapi_name() === 'cli' ? PHP_EOL : '<br />';

        $date = new \DateTime();

        $serviceFactory = new CurrencyServiceFactory();
        $averageRateBuilder = new AverageRateBuilder();

        $rbcService = $serviceFactory->createService(RbcService::NAME);
        $cbrService = $serviceFactory->createService(CbrService::NAME);

        /**
         * Getting average rates
         * (cbr.ru is not always working!!!)
         */
        $usdRates = [];
        $usdRates[] = $rbcService->getUsdToRubRate($date);
        $usdRates[] = $cbrService->getUsdToRubRate($date);

        $averageUsdRate = $averageRateBuilder->fromArray($usdRates);
        printf("Average USD rate: %s%s", $averageUsdRate->getRate(), $eol);

        $eurRates = [];
        $eurRates[] = $rbcService->getEurToRubRate($date);
        $eurRates[] = $cbrService->getEurToRubRate($date);

        $averageEurRate = $averageRateBuilder->fromArray($eurRates);
        printf("Average EUR rate: %s%s", $averageEurRate->getRate(), $eol);
    }
}
