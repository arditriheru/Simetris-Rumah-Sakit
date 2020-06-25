<script type="text/javascript">
	function timer(id)
	{
	date = new Date;
	h = date.getHours();
	if(h<10)
	{
	h = "0"+h;
	}
	m = date.getMinutes();
	if(m<10)
	{
	m = "0"+m;
	}
	s = date.getSeconds();
	if(s<10)
	{
	s = "0"+s;
	}
	result = ''+h+':'+m+':'+s;
	document.getElementById(id).innerHTML = result;
	setTimeout('timer("'+id+'");','1000');
	return true;
	}
</script>
<span id="timer"></span>
<script type="text/javascript">window.onload = timer('timer');</script>