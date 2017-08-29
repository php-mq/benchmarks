<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Benchmarks;

use PHPMQ\Benchmarks\Infrastructure\Configs\PHPMQClientConfig;
use PHPMQ\Client\Client;
use PHPMQ\Client\Sockets\ClientSocket;
use PHPMQ\Client\Sockets\Types\NetworkSocket;

/**
 * Class Env
 * @package PHPMQ\Benchmarks
 */
final class Env
{
	/** @var array */
	private $pool = [];

	private function getSharedInstance( string $key, \Closure $createFunction )
	{
		if ( !isset( $this->pool[ $key ] ) )
		{
			$this->pool[ $key ] = $createFunction->call( $this );
		}

		return $this->pool[ $key ];
	}

	public function getPHPMQClient() : Client
	{
		return $this->getSharedInstance(
			'PHPMQClient',
			function ()
			{
				$config        = new PHPMQClientConfig();
				$networkSocket = new NetworkSocket( $config->getHost(), $config->getPort() );
				$clientSocket  = new ClientSocket( $networkSocket );

				return new Client( $clientSocket );
			}
		);
	}
}
