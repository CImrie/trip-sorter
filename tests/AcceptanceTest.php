<?php


namespace CImrie\FlightSorter\Tests;


use CImrie\FlightSorter\BoardingPassGenerator;

class AcceptanceTest extends TestCase {
	
	/**
	 * @test
	 */
	public function can_import_boarding_passes_from_json_file()
	{
	    $generator = new BoardingPassGenerator();
	    $journey = $generator->generateFromFile(__DIR__ . '/boarding_passes.json');

	    $directions = <<<EOF
1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.
5. You have arrived at your final destination.
EOF;


	    $this->assertCount(4, $journey->getBoardingPasses()->inChronologicalOrder());
	    $this->assertEquals($directions, $journey->getDirections());
	}
}