<?php

/**
 * An IPv4 CIDR block
 */
class IPv4Block extends IPBlock
{
	const IP_VERSION = 4;
	const MAX_BITS = 32;

	/**
	 * Return netmask
	 *
	 * @return IPv4
	 */
	public function getMask()
	{
		if ( $this->prefix == 0 ) {
			return new IPv4(0);
		}
		return new IPv4(IPv4::MAX_INT << (self::MAX_BITS-$this->prefix));
	}

	/**
	 * Return delta to last IP address
	 *
	 * @return IPv4
	 */
	public function getDelta()
	{
		if ( $this->prefix == 0 ) {
			return new IPv4(IPv4::MAX_INT);
		}
		return new IPv4((1 << (self::MAX_BITS-$this->prefix)) - 1);
	}
}