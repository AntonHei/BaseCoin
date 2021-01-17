function getHash(prevHash, data, nonce) {
	var preHash = "";

	preHash = prevHash + "-" + data + "-" + nonce;

	return sha256(preHash);
}