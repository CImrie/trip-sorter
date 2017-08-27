<?php


namespace CImrie\FlightSorter;


use CImrie\FlightSorter\Exceptions\InvalidJourneyException;

class BoardingPassCollection {

	/**
	 * @var BoardingPass[]
	 */
	protected $boardingPasses;

	/**
	 * @var BoardingPass[]
	 */
	protected $sources;

	/**
	 * @var BoardingPass[]
	 */
	protected $destinations;

	public function __construct($boardingPasses)
	{
		$this->boardingPasses = $boardingPasses;
		$this->importBoardingPasses($boardingPasses);
	}

	/**
	 * @param BoardingPass[] $boardingPasses
	 */
	protected function importBoardingPasses($boardingPasses)
	{
		foreach($boardingPasses as $pass) {
			$this->sources[$pass->getSource()] = $pass;
			$this->destinations[$pass->getDestination()] = $pass;
		}
	}

	protected function from(BoardingPass $pass, $currentPasses = [])
	{
		$currentPasses[] = $pass;

		if(!$this->hasDestination($pass)) {
			return $currentPasses;
		}

		return $this->from($this->getNextPass($pass), $currentPasses);
	}

	public function inChronologicalOrder()
	{
		// follow linearly from point to point
		return $this->from($this->getStartingPoint());
	}

	protected function hasDestination(BoardingPass $pass)
	{
		return in_array($pass->getDestination(), array_keys($this->sources));
	}

	protected function getNextPass(BoardingPass $pass)
	{
		return $this->sources[$pass->getDestination()];
	}

	public function getStartingPoint()
	{
		$sourceLocationNames = array_keys($this->sources);
		$destinationLocationNames = array_keys($this->destinations);

		// get start point, the location name of which is not the destination of any other boarding pass
		$starts = array_filter($sourceLocationNames, function($source) use ($destinationLocationNames) {
			return !in_array($source, $destinationLocationNames);
		});

		if(!count($starts) === 1) {
			throw new InvalidJourneyException("You cannot start from more than one location");
		}

		/** @var string $start */
		$start = array_values($starts)[0];

		return $this->sources[$start];
	}
}