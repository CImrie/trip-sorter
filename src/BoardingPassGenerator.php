<?php


namespace CImrie\FlightSorter;


use CImrie\FlightSorter\BoardingPasses\AirportBus;
use CImrie\FlightSorter\BoardingPasses\Flight;
use CImrie\FlightSorter\BoardingPasses\Train;

class BoardingPassGenerator {

	protected $map = [
		'train'      => Train::class,
		'flight'     => Flight::class,
		'airportbus' => AirportBus::class,
	];

	/**
	 * @param string $path
	 *
	 * @return Journey
	 */
	public function generateFromFile($path)
	{
		$data           = json_decode(file_get_contents($path), true);
		$boardingPasses = [];

		foreach($data as $pass)
		{
			/** @var BoardingPass $boardingPass */
			$boardingPass = new $this->map[$pass['type']];
			$boardingPasses[] = $boardingPass->fromArray($pass);
		}

		return new Journey($boardingPasses);
	}
}