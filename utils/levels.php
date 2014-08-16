<?php
namespace Rpg\Utils;

require_once('experience.php');

use Rpg\Utils\Experience as XP;

	// class of levels used for a rank that have their xp calculated in the rank class

class Levels
{
	private $levels;
	private $xp;
	private $points;
	private $calculated;
	
	// constructor takes the number of levels and computes the expierence based on the number of levels
	public function __construct( $levels )
	{
		$this->xp = new XP();
		$this->levels = $levels;
		$this->calculated = false;
	}
	
	// method that computes the expierence points based on the xp number
	private function XpPerLevel()
	{
		for( $i = 1; $i <= $this->levels; $i++ )
		{
			$this->points[$i] = $this->xp->Compute( $i );
		}
		
		$this->points[$this->levels + 1] = $this->xp->Compute( $this->levels + 1 );
		
		$this->calculated = true;
	}
	
	public function GetXpPoints()
	{
		if( $this->calculated )
		{
			return $this->points;
		}
		else
		{
			$this->XpPerLevel();
			
			return $this->points;
		}
	}
	
	public function GetLevels()
	{
		return $this->levels;
	}
}
?>