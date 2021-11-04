document.addEventListener('DOMContentLoaded', function() {
	// Deposits dropdowm section...
	const userDrop = document.querySelectorAll(".dropdown1");
	M.Dropdown.init(userDrop, {
	  closeOnClick: true,
	//   hover: true,
	  alignment: 'bottom',
	  inDuration: 1100,
	  outDuration: 500,
	  constrainWidth: true,
	  coverTrigger: false,
	});

	// side nav section
	const sidenav = document.querySelector(".sidenav");
	M.Sidenav.init(sidenav, {
	  edge: 'left',
	  draggable: true,
    });
    
    // side nav section
	const sidenav2 = document.querySelector(".sidenav2");
	M.Sidenav.init(sidenav2, {
	  edge: 'left',
	  draggable: true,
    });

    // Collapsible accordion section
    const coll = document.querySelectorAll('.collapsible');
    M.Collapsible.init(coll);

    // slider section
    const sld = document.querySelector('.slider');
    M.Slider.init(sld, {
      height: 630,
      duration: 900,
      indicators: true,
      interval: 10000,
    });

	//Modal...
    const modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

});
