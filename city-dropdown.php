<?php
//Connection
$connection =  mysqli_connect("localhost", "root", "","ajax");

/*
 * Step 1 Connection
 *  2 Create XML Http Object
 */

?>

<html>
    <head>
        
       
        
  
        
       
<script type="text/javascript">
    
  function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();  // XMLHttpRequest object is used to exchange data with a server behind the scenes. 
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
    
    // Below Function Will Fetch Data From the URL and Also Will Return Response
function getsubcat(strURL)
{         
 var req = getXMLHTTP(); // fuction to get xmlhttp object
	if (req)
	{
		req.onreadystatechange = 
		function(){
		if (req.readyState == 4) 
		{ //data is retrieved from server
			if (req.status == 200) 
				{ // which reprents ok status                    
				document.getElementById('subdiv').innerHTML=req.responseText;
			}
				else
					{ 
						alert("There was a problem while using XMLHTTP:\n");
					}
			}            
		}        
	req.open("GET", strURL, true); //open url using get method
	req.send(null);
 }
}
</script>

    </head>
    
    <body>
        <h1>State City Ajax</h1>
        <form>
          State  <select name="state" onchange="getsubcat('ajax-get-city.php?state='+this.value)">
             <?php 
                        
                        $q = mysqli_query($connection,"select * from state");
                        
                       
                        echo "<option>Select State</option>";
                        while($data = mysqli_fetch_row($q))
                        {
                           echo "<option value='$data[0]'>$data[1]</option>"; 
                        }
                    
                        
                        ?>
            </select>
            
            <br>
         
                    <div id="subdiv">
                           
                    </div>
           
            
        </form>
    </body>
    
</html>