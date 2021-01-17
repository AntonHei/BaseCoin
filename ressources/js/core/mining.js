function startMining(prevHash, data, targetPrefix) {
	console.log('[BaseCoin] Starting to Mine');

	//Runtime Vars
	var result = false;
	var curNonce = 0;

	//Loop through the nonce till its fitting
	while (result === false) {
		let curHash = getHash(prevHash, data, curNonce);

		let targetPrefixLength = targetPrefix.length;
		if(curHash.substring(0, targetPrefixLength) == targetPrefix) {
			result = curNonce;
			console.log('[BaseCoin] Hash was accepted: ' + curHash);
			console.log('[BaseCoin] Target Nonce is: ' + curNonce);
		}

		if(result === false) {
			curNonce++;
		}
	}
	return result;
}