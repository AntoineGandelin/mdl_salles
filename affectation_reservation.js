function ajax(url, bloc)
   {
   var req = false;

   if(window.XMLHttpRequest)
      {
      req = new XMLHttpRequest();
      if (req.overrideMimeType)
         {
         req.overrideMimeType("text/xml");
         }
      }
   else
      {
      if (window.ActiveXObject)
         {
         try
            {
            req = new ActiveXObject("Msxml2.XMLHTTP");
            }
         catch (e)
            {
            try
               {
               req = new ActiveXObject("Microsoft.XMLHTTP");
               }
            catch (e)
               {
               alert('Problème');                  
               }
            }
         }
      }
   if (req)
      {
        req.onreadystatechange = function()
           {
           if (req.readyState == 4)
              {
            if (req.status == 200)
               {
                var d = document.getElementById(bloc);
                d.innerHTML = req.responseText;
               }
            else
               {
                alert('Problème');
               }
              }
           }
        req.open('GET', url, true);
        req.send(null);
      }
	}


function ajax_affect()
	{
	var d = document.getElementsByTagName('select')[0];
	if (d.value != 0) 
		{
		u = 'affectation_reservation_ajax.php?id='+d.value;
		b = 'affect';
		ajax(u,b);
		}
	}

	
	
	
	
	
	
	
	
	
	