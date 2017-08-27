<?php


namespace CImrie\FlightSorter;


class Journey {

	/**
	 * @var BoardingPassCollection
	 */
	protected $boardingPasses;

	public function __construct($boardingPasses)
	{
		$this->boardingPasses = new BoardingPassCollection($boardingPasses);
	}

	public function getBoardingPasses()
	{
		return $this->boardingPasses;
	}

	public function getDirections()
	{
		$directions = "";
		$passes = $this->getBoardingPasses()->inChronologicalOrder();

		foreach($passes as $position => $boardingPass) {

			if($position !== 0) {
				$directions .= "\n";
			}

			$directions .= sprintf("%s. %s", ($position + 1), $boardingPass->getDirections());
		}

		$directions .= sprintf("\n%s. You have arrived at your final destination.", (count($passes) + 1));

		return $directions;
	}
}