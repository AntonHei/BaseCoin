function getBlocksCountFromClient() {
	var count = 0;
	for(let i = 0; i < localStorage.length; i++) {
		let curKeyName = localStorage.key(i);
		if(localStorage.getItem(curKeyName).startsWith('Block_')) {
			count++;
		}
	}
	return count;
}

function addBlockToClient(prevHash, data, finalHash, nonce) {

	let freshHash = getHash(prevHash, data, nonce);

	var curObj = {};

	//Verify Hash
	if(finalHash == freshHash) {
		curObj = {
			'prevHash': prevHash,
			'data': data,
			'hash': finalHash,
			'nonce': nonce
		};
	}else{
		return false;
	}

	let newIndex = (getBlocksCountFromClient() + 1);

	console.log('[BaseCoin] Block is being added to the Blockchain: Block_' + newIndex);

	localStorage.setItem('Block_' + newIndex, JSON.stringify(curObj));
	return newIndex;
}

function getBlockFromClient(index) {
	var curBlock = localStorage.getItem('Block_' + index);

	var result = JSON.parse(curBlock);

	return result;
}