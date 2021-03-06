<?php
class Buff extends Modifier
{
	public function __construct( $name, $descr, $mod_amt, $type )
	{
		$this->name = $name;
		$this->descr = $descr;
		$this->mod_amount = $mod_amt;
		
		$this->activate();
		
		switch( $type )
		{
			case SELF::PERCENT:
				$this->type = "/";
			break;
			case SELF::VALUE:
				$this->type = "#";
			break;
			default:
				$this->type = "/";
			break;
		}
	}
	
	public function Modify( $value )
	{
		return ( ( $this->type == "/" ) ? $value += ( ( $value * $this->mod_amount ) / 100 ) : $value += $this->mod_amount );
	}
}
?>