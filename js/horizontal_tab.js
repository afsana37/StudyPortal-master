
					function openTab(evt, TabName) {
					  var i, x, tablinks;
					  x = document.getElementsByClassName("tab");
					  for (i = 0; i < x.length; i++) {
						 x[i].style.display = "none";
					  }
					  tablinks = document.getElementsByClassName("tablink");
					  for (i = 0; i < x.length; i++) {
						 tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
					  }
					  document.getElementById(TabName).style.display = "block";
					  evt.currentTarget.firstElementChild.className += " w3-border-red";
					}
