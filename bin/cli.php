<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Benchmarks\Bin;

use PHPMQ\Benchmarks\Application\CLI\Commands\SendSingleMessageCommand;
use PHPMQ\Benchmarks\Env;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$env = new Env();
$app = new Application( 'PHPMQ/Benchmarks', '0.1.0' );

try
{
	$app->add( new SendSingleMessageCommand( 'send:single-message', $env ) );

	$exitCode = $app->run();

	exit( $exitCode );
}
catch ( \Throwable $e )
{
	echo get_class( $e ), "\n";
	echo $e->getMessage(), "\n";
	echo $e->getTraceAsString(), "\n";

	exit( 1 );
}
