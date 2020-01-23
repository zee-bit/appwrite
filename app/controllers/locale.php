<?php

global $utopia, $register, $request, $response, $projectDB, $project, $user, $audit;

use Utopia\App;
use Utopia\Locale\Locale;
use GeoIp2\Database\Reader;

include_once 'shared/api.php';

$utopia->get('/v1/locale/countries')
    ->desc('List Countries')
    ->label('scope', 'locale.read')
    ->label('sdk.namespace', 'locale')
    ->label('sdk.method', 'getCountries')
    ->label('sdk.description', '/docs/references/locale/get-countries.md')
    ->action(
        function () use ($response) {
            $list = Locale::getText('countries'); /* @var $list array */

            asort($list);

            $response->json($list);
        }
    );

$utopia->get('/v1/locale/countries/eu')
    ->desc('List EU Countries')
    ->label('scope', 'locale.read')
    ->label('sdk.namespace', 'locale')
    ->label('sdk.method', 'getCountriesEU')
    ->label('sdk.description', '/docs/references/locale/get-countries-eu.md')
    ->action(
        function () use ($response) {
            $countries = Locale::getText('countries'); /* @var $countries array */
            $eu = include __DIR__.'/../config/eu.php';
            $list = [];

            foreach ($eu as $code) {
                if (array_key_exists($code, $countries)) {
                    $list[$code] = $countries[$code];
                }
            }

            asort($list);

            $response->json($list);
        }
    );

$utopia->get('/v1/locale/countries/phones')
    ->desc('List Countries Phone Codes')
    ->label('scope', 'locale.read')
    ->label('sdk.namespace', 'locale')
    ->label('sdk.method', 'getCountriesPhones')
    ->label('sdk.description', '/docs/references/locale/get-countries-phones.md')
    ->action(
        function () use ($response) {
            $list = include __DIR__.'/../config/phones.php'; /* @var $list array */

            $countries = Locale::getText('countries'); /* @var $countries array */

            foreach ($list as $code => $name) {
                if (array_key_exists($code, $countries)) {
                    $list[$code] = $countries[$code].' +'.$list[$code];
                }
            }

            asort($list);

            $response->json($list);
        }
    );

$utopia->get('/v1/locale/continents')
    ->desc('List Countries')
    ->label('scope', 'locale.read')
    ->label('sdk.namespace', 'locale')
    ->label('sdk.method', 'getContinents')
    ->label('sdk.description', '/docs/references/locale/get-continents.md')
    ->action(
        function () use ($response) {
            $list = Locale::getText('continents'); /* @var $list array */

            asort($list);

            $response->json($list);
        }
    );


$utopia->get('/v1/locale/currencies')
    ->desc('List Currencies')
    ->label('scope', 'locale.read')
    ->label('sdk.namespace', 'locale')
    ->label('sdk.method', 'getCurrencies')
    ->label('sdk.description', '/docs/references/locale/get-currencies.md')
    ->action(
        function () use ($response) {
            $currencies = include __DIR__.'/../config/currencies.php';

            $response->json($currencies);
        }
    );
