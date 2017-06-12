<?php
/**
 * SwiftBcc for Swift library
 * @link http://swiftmailer.org/docs/plugins.html
 */
namespace SwiftBcc;

/**
 * SwiftBcc class
 */
class SwiftBcc implements \Swift_Events_SendListener {

	/**
	 * BCC address
	 *
	 * @var string $strBcc
	 */
	private $strBcc;

	/**
	 * Constructor
	 *
	 * @param array $arrOptions Options defined in the configuration
	 */
	public function __construct(array $arrOptions = []) {
		if (isset($arrOptions['bcc'])) {
			$this->strBcc = $arrOptions['bcc'];
		}
	}

	/**
	 * Add bcc before sending
	 *
	 * @param \Swift_Events_SendEvent $objEvent
	 */
	public function beforeSendPerformed(\Swift_Events_SendEvent $objEvent) {
		if ($this->strBcc) {
			$objMessage = $objEvent->getMessage();
			$objMessage->setBcc($this->strBcc);
		}
	}

	/**
	 * Do nothing
	 *
	 * @param \Swift_Events_SendEvent $objEvent
	 */
	public function sendPerformed(\Swift_Events_SendEvent $objEvent){
		// do nothing
	}
}