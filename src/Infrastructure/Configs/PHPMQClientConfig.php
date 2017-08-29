<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Benchmarks\Infrastructure\Configs;

/**
 * Class PHPMQClientConfig
 * @package PHPMQ\Benchmarks\Infrastructure\Configs
 */
final class PHPMQClientConfig
{
	/** @var array */
	private $configData;

	public function __construct()
	{
		$this->configData = require __DIR__ . '/../../../config/PHPMQClient.php';
	}

	public function getHost() : string
	{
		return (string)$this->configData['host'];
	}

	public function getPort() : int
	{
		return (int)$this->configData['port'];
	}
}
