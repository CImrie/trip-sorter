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
}