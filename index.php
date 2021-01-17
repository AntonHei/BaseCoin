<!DOCTYPE html>

<html>

	<head>
		<?php
			include 'ressources/layout/head.php';
		?>
	</head>


	<body>

	    <?php
			include 'ressources/layout/special/sidebar_pre.php';
		?>

		<iframe src="subSites/home.php" class="subSite_content" title="BaseCoin"></iframe>

		<?php
			include 'ressources/layout/special/sidebar_suf.php';
		?>

		<!--
			Sidebar JS
		-->
		<script src="ressources/js/sidebarNavigation.js"></script>

		<?php
			include 'ressources/layout/footer.php';
		?>

	</body>

</html>