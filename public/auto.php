<html>
<head>


</head>
<body>
<form name="form0" id="form0">

1: <input type="text" name="box1" id="box1" class="add"  onKeyUp="Calc('add')"  onClick="this.focus();this.select();" />
<br />

2: <input type="text" name="box2" id="box2" class="add"  onKeyUp="Calc('add')" onClick="this.focus();this.select();" />
<br />

3: <input type="text" name="box3" id="box3" class="add"  onKeyUp="Calc('add')" onClick="this.focus();this.select();" />

<br />
3: <input type="text" name="box3" id="box3" class="add"  onKeyUp="Calc('add')" onClick="this.focus();this.select();" />

<br />
3: <input type="text" name="box3" id="box3" class="add"  onKeyUp="Calc('add')" onClick="this.focus();this.select();" />

<br />

<br />
Total: <input readonly style="border:0px; font-size:14; color:red;" id="total" name="total">

</form>
</body>

<script language="javascript">
    function Calc(className){
    var elements = document.getElementsByClassName(className);
    var total = 0;
      
    for(var i = 0; i < elements.length; ++i){
    total += parseInt(elements[i].value);
    }
    
    document.form0.total.value = total;
    }
    
    </script></html>
