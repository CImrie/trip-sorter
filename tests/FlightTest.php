<?php


namespace CImrie\FlightSorter\Tests;


use CImrie\FlightSorter\BoardingPasses\Flight;

class FlightTest extends TestCase {

	/**
	 * @test
	 */
	public function can_import_flight_from_data_array()
	{
		$flight = new Flight();
		$flight->fromArray(
			$data = [
				'baggage' => 'Baggage drop at ticket counter 344',
				'seat'    => '3A',
				'gate'    => '45B',
				'to'      => 'Stockholm',
				'from'    => 'Gerona Airport',
				'flight'  => 'SK455',
			]
		);

		$this->assertEquals($data['baggage'], $flight->getBaggageInformation());
		$this->assertEquals($data['seat'], $flight->getSeat());
		$this->assertEquals($data['gate'], $flight->getGate());
		$this->assertEquals($data['to'], $flight->getDestination());
		$this->assertEquals($data['from'], $flight->getSource());
		$this->assertEquals($data['flight'], $flight->getDepartureNumber());
	}
}