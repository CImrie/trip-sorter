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
	public function can_sort_journey_waypoints_from_beginning_to_end()
	{

	}

}