var subSites = [
		{
			'title': 'Startseite',
			'icon': 'home',
			'file': 'home.php'
		},
		{
			'title': 'Blöcke',
			'icon': 'box',
			'file': 'blocks.php'
		},
		{
			'title': 'Mining',
			'icon': 'cpu',
			'file': 'mining.php'
		},
		{
			'title': 'Transaktionshistorie',
			'icon': 'database',
			'file': 'transactions.php'
		},
		{
			'title': 'Transferieren',
			'icon': 'credit-card',
			'file': 'actionSites/transfer.php'
		}
	];

function refreshSideBar() {

	for(let i = 0; i < subSites.length; i++) {

		var cur_nav_item = '';
		cur_nav_item += '<li class="nav-item" target="' + subSites[i]['file'] + '" onclick="onNavItemClick(event, ' + i +  ');">';
	    cur_nav_item += '<a class="nav-link active">';
	    cur_nav_item += '<span data-feather="' + subSites[i]['icon'] +  '"></span>';
	    cur_nav_item += '<span>';
	    cur_nav_item += subSites[i]['title'];
      	cur_nav_item += '</span>';
	    cur_nav_item += '</a>';
	    cur_nav_item += '</li>';

		$('.sidebar .nav').append(cur_nav_item);

	}
	feather.replace();

}

function onNavItemClick(event, index) {
	event.preventDefault();
	changeToSubSite(index);
}

function changeToSubSite(index) {
	$('.subSite_content').attr('src', 'subSites/' + subSites[index]['file']);

	//Change the URL
	window.history.pushState(null, subSites[index]['title'], '#' + subSites[index]['title']);
}

function init() {
	refreshSideBar();
}

$(document).ready(function() {

	init();

});