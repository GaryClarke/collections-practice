<?php

use Doctrine\Common\Collections\ArrayCollection;

require './vendor/autoload.php';


$lille = [
    'name'                => 'Lille',
    'country'             => 'France',
    'population'          => 238_381,
    'geohash_coordinates' => 'u140j97nqjd'
];

$cities = [
    [
        'name'       => 'Frankfurt',
        'country'    => 'Germany',
        'population' => 785_000,
    ],
    [
        'name'       => 'Mumbai',
        'country'    => 'India',
        'population' => 20_000_000,
    ],
    [
        'name'       => 'Valencia',
        'country'    => 'Spain',
        'population' => 834_920,
    ]
];
$citiesCollection = new ArrayCollection($cities);

$citiesPartitionedByPopulation = $citiesCollection->partition(function ($key, $city) {

    return $city['population'] > 15_000_000;
});

$denselyPopulatedCities = $citiesCollection->exists(function ($key, $city) {

    return $city['population'] > 15_000_000;
});



// filter
$filteredCities = $citiesCollection->filter(function ($city) {

   return $city['population'] > 800_000;
});

// add
$filteredCities->add($lille);

// remove
$filteredCities->remove(3);

// contains
$contains = $filteredCities->contains([
    'name'       => 'Valencia',
    'country'    => 'Spain',
    'population' => 834_920,
]);

// indexOf
$indexOf = $filteredCities->indexOf([
    'name'       => 'Valencia',
    'country'    => 'Spain',
    'population' => 834_920,
]);

// get
$lilleCollection = new ArrayCollection($lille);
$name = $lilleCollection->get('name');

// first
$first = $filteredCities->first();

// last
$last = $filteredCities->last();

// exists


// parition


// toArray
$lilleArray = $lilleCollection->toArray();

$citiesCollection->add($lilleArray);













