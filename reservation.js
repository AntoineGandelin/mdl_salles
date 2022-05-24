function connect()
	{
	var d=document.getElementById('connect');
	d.style.display = 'block';
	}
	
function reserver()
	{
	var r=document.getElementsByTagName('input');
	val = 0;
	let j = 0;
	let inp = new Array(3);
	for(i=0; i<r.length; i++)
		{
		if(r[i].getAttribute('type')=='radio')
			{
			if(r[i].checked == true)
				{
				val = r[i].getAttribute('value');					
				}			
			}
		if(r[i].getAttribute('type')=='hidden')
			{
			let a = r[i].getAttribute('value');
			inp[j++]=a;
			}
		}
	if(val != 0)
		{
		window.location = 'reservation_go.php?ch='+val+'&id='+inp[0]+'&log='+inp[1];		
		}
	else 
		{
		alert("Vous devez cochez une ligne.");
		} 	
	}	