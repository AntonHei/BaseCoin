<?php
  include 'layout/subSite_head.php';
?>

<main role="main" class="col-md-9 mw-100 col-lg-10 pt-3 px-4" style="white-space:nowrap;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">BaseCoin - Blocks</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">

      </div>
    </div>
  </div>

    You are currently mining BaseCoin
  	<br>
  	<div id="miningOutput">

  	</div>
  	<?php
  		include '../ressources/php/classes/Block.php';

  		//JS Import
  		include '../ressources/js/core/import.php';

  		startImport(2); //Heavy Import for cryptography, etc.

  		$curBlock = new Block('123', 'data');

  		$curBlock_prevHash = $curBlock->prevHash;
  		$curBlock_data = $curBlock->data;

  		$targetHashPrefix = '1234';

  		//JS Mining Start
  		echo '<script>';
  		echo 'let curNonce = startMining("' . $curBlock_prevHash . '", "' . $curBlock_data . '", "' . $targetHashPrefix . '");';
  		echo 'let acceptedHash = getHash("' . $curBlock_prevHash . '" , "' . $curBlock_data . '", curNonce);';
  		echo '$("#miningOutput").append("Fitting Nonce is: " + curNonce + "<br>");';
  		echo '$("#miningOutput").append("Accepted Hash: " + acceptedHash + "<br>");';
  		echo 'let newBlockIndex = addBlockToClient("' . $curBlock_prevHash . '", "' . $curBlock_data . '", acceptedHash, curNonce);';
  		echo 'console.log(getBlockFromClient(newBlockIndex));';
  		echo 'console.log("The Client currently holds: " + getBlocksCountFromClient() + " Blocks");';
  		echo '</script>';

  	?>

</main>

<?php
  include 'layout/subSite_footer.php';
?>