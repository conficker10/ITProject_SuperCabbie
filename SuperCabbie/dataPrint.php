<?php
	include 'connect.php';
	
	echo "<script>
				function showData(str) {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
						}
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						document.getElementById('abc').innerHTML = '';
						document.getElementById('abc').innerHTML =
						this.responseText;
						}
						};
						xmlhttp.open('GET','dropDown.php?q='+str,true);
						xmlhttp.send();
				}
				
				function search()
				{
					var x = document.getElementById('search').value;
					if(x == '')
						return;
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
						}
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						document.getElementById('abc').innerHTML = '';
						document.getElementById('abc').innerHTML =
						this.responseText;
						}
						};
						xmlhttp.open('GET','search.php?q='+x,true);
						xmlhttp.send();
				}
				window.onload=showData('*');
		</script>";
	echo "<center><br><Label>Fuel Type:&nbsp;</Label><select name='users' onchange='showData(this.value)'>
				<option value='*' selected>ALL</option>
				<option value='Petrol'>Petrol</option>
				<option value='Diesel'>Diesel</option>
				<option value='CNG'>CNG</option>
			</select>&emsp;&emsp;&emsp;&emsp;
			<input type='text' name='t1' id='search' placeholder='What You Looking For?' />&nbsp;<button class='button' type='submit' value='Search' id='submitt' onclick='search()'>Search</button>
			</center>";
	
	echo "<div id='abc'></div>";
?>