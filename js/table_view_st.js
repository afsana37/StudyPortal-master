function show(nr) {
	var x;
	x = document.getElementsByClassName("table_view");
	
	 for (i = 0; i < x.length; i++) {
						document.write(x[i]);
						 document.getElementById(x[i]).style.display="none";
						 document.getElementById(x[i]).style.border="5px solid #ccc";
					  }
					  
	
    document.getElementById("table"+nr+"_view_st").style.display="block";
    document.getElementById("view_st_dep_"+nr).style.border="5px solid #000";
						 
}