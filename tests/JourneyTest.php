<?php


namespace CImrie\FlightSorter\Tests;


use CImrie\FlightSorter\BoardingPasses\Flight;
use CImrie\FlightSorter\BoardingPasses\Train;
use CImrie\FlightSorter\Journey;

class JourneyTest extends TestCase {

	/**
	 * @test
	 */
	public function can_find_start_location()
	{
		$passes = [
			(new Train)
				->setSource("Glasgow")
				->setDestination("Edinburgh"),
			$start = (new Flight)
				->setSource("London")
				->setDestination("Glasgow"),
			(new Train)
				->setSource("Edinburgh")
				->setDestination("Aberdeen")
		];

		$journey = new Journey($passes);

		$this->assertEquals($start, $journey->getBoardingPasses()->getStartingPoint());
	}

	/**
	 * @test
	 */
	public function can_find_end_location()
	{
		$passes = [
			(new Train)
				->setSource("Glasgow")
				->setDestination("Edinburgh"),
			(new Flight)
				->setSource("London")
				->setDestination("Glasgow"),
			$end = (new Train)
				->setSource("Edinburgh")
				->setDestination("Aberdeen")
		];

		$journey = new Journey($passes);

		$sorted = $journey->getBoardingPasses()->inChronologicalOrder();

		$this->assertCount(3, $sorted);
		$this->assertEquals($end, $sorted[2]);
	}
	
	/**
	 * @test
	 */
	public function can_output_human_readable_directions_for_journey()
	{
		$passes = [
			(new Train)
				->setSource("Glasgow")
				->setDestination("Edinburgh")
				->setDepartureNumber("G1")
				->setSeat("A1")
			,
			(new Flight)
				->setSource("London")
				->setDestination("Glasgow")
				->setDepartureNumber("F111")
				->setBaggageInformation("Baggage drop at ticket counter 1")
				->setGate("5A")
				->setSeat("1F")
			,
			(new Train)
				->setSource("Edinburgh")
				->setDestination("Aberdeen")
				->setSeat("E5")
				->setDepartureNumber("EA34")
		];

		$journey = new Journey($passes);

		$directions = <<<EOF
1. From London, take flight F111 to Glasgow. Gate 5A, seat 1F. Baggage drop at ticket counter 1.
2. Take train G1 from Glasgow to Edinburgh. Sit in seat A1.
3. Take train EA34 from Edinburgh to Aberdeen. Sit in seat E5.
EOF;

		$this->assertEquals($directions, $journey->getDirections());
	}
}