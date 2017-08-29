<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Benchmarks\Application\CLI\Commands;

use PHPMQ\Benchmarks\Env;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class AbstractCommand
 * @package PHPMQ\Benchmarks\Application\CLI\Commands
 */
abstract class AbstractCommand extends Command
{
	/** @var Env */
	private $env;

	/** @var SymfonyStyle */
	private $style;

	public function __construct( string $name, Env $env )
	{
		parent::__construct( $name );
		$this->env = $env;
	}

	final protected function getEnv() : Env
	{
		return $this->env;
	}

	final protected function getStyle() : SymfonyStyle
	{
		return $this->style;
	}

	final protected function setStyle( SymfonyStyle $style )
	{
		$this->style = $style;
	}
}
