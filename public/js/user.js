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

    // Collapsible accordion section
    const coll = document.querySelectorAll('.collapsible');
    M.Collapsible.init(coll);

    //Modal...
    const modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    // Form select
    const formSelect = document.querySelectorAll('select');
    M.FormSelect.init(formSelect);
    
    // Materialboxed... 
    const materialbox = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(materialbox);

});
