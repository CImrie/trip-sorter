<?php


namespace CImrie\FlightSorter\Tests;


use CImrie\FlightSorter\BoardingPasses\Train;

class TrainTest extends TestCase {

	/**
	 * @test
	 */
	public function can_import_flight_from_data_array()
	{
		$train = new Train();
		$train->fromArray(
			$data = [
				"seat"  => "45B",
				"to"    => "Barcelona",
				"from"  => "Madrid",
				"train" => "78A",
				"type"  => "train",
			]
		);

		$this->assertEquals($data['seat'], $train->getSeat());
		$this->assertEquals($data['to'], $train->getDestination());
		$this->assertEquals($data['from'], $train->getSource());
		$this->assertEquals($data['train'], $train->getDepartureNumber());
	}
}