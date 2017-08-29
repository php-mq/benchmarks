<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Benchmarks\Application\CLI\Commands;

use PHPMQ\Client\Types\QueueName;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class SendSingleMessageCommand
 * @package PHPMQ\Benchmarks\Application\CLI\Commands
 */
final class SendSingleMessageCommand extends AbstractCommand
{
	protected function configure() : void
	{
		$this->setDescription( 'Sends a single message to the PHPMQ server.' );
		$this->addArgument( 'queue', InputArgument::REQUIRED, 'Queue name' );
		$this->addArgument( 'message', InputArgument::REQUIRED, 'Message content' );
	}

	protected function execute( InputInterface $input, OutputInterface $output ) : int
	{
		$this->setStyle( new SymfonyStyle( $input, $output ) );

		$queueName = new QueueName( (string)$input->getArgument( 'queue' ) );
		$content   = (string)$input->getArgument( 'message' );
		$client    = $this->getEnv()->getPHPMQClient();

		try
		{
			$client->sendMessage( $queueName, $content );

			$this->getStyle()->success( 'Message sent to queue "' . $queueName . '"' );

			return 0;
		}
		catch ( \Throwable $e )
		{
			$this->getStyle()->error( get_class( $e ) . ': ' . $e->getMessage() );

			return 1;
		}
	}
}
