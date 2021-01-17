<?php

class Block {
	public $prevHash = null;
	public $data = null;

	//Runtime Vars
	public $finalHash = false;
	public $nonce = null;

	function __construct($curPrevHash, $curData) {
		$this->prevHash = $curPrevHash;
		$this->data = $curData;
	}

	function getHash($customNonce = null) {
		$preHash = "";

		if(!$customNonce) {
			$preHash = $this->prevHash . "-" . $this->data . "-" . $this->nonce;
		}else{
			$preHash = $this->prevHash . "-" . $this->data . "-" . $customNonce;
		}

		return hash('sha256', $preHash);
	}

	function finalizeBlock($targetNonce) {
		$curHash = $this->getHash($targetNonce);

		$this->finalHash = $curHash;
	}

	function startMining($targetPrefix = '0') {
		//Runtime Vars
		$result = false;
		$curNonce = 0;

		//Loop through the nonce till its fitting
		while ($result === false) {
			$curHash = $this->getHash($curNonce);

			$targetPrefixLength = strlen($targetPrefix);
			if(substr($curHash, 0, $targetPrefixLength) == $targetPrefix) {
				$result = $curNonce;
				echo 'Hash was accepted. <br>';
			}

			if($result === false) {
				$curNonce++;
			}
		}
		return $result;
	}
}