function onclickedfunction(v){
    var display_field=document.getElementById("display_field");
    try{
        switch(v){
            case 'C':
                display_field.value='';
                return ;
            case 'B':
                var value=display_field.value;
                display_field.value=value.slice(0,value.length-1);
                return ;
            case 'S':
                var value=display_field.value;
                display_field.value=eval(value)*eval(value);
                return ;
            case 's':
                var value=display_field.value;
                display_field.value=Math.sqrt(eval(value));
                if(display_field.value=='NaN'){
                    alert("You cannot get squareroot of negative number!!!");
                    display_field.value="";
                }
                return ;
            case '=':
                var value=display_field.value;
                display_field.value=eval(value);
                if(display_field.value=='NaN' || display_field.value=='Infinity' || display_field.value=='undefined'){
                    throw 'Exception';
                }
                return ;
            default:
                display_field.value+=v;
                return ;
        }
    }catch(e){
        alert("Enter appropriate expression!!!");
        display_field.value="";
    }
    
}
function onchangedfunction(){
    var display_field=document.getElementById("display_field");
    var l="0123456789./*-+()".split("");
    for(var i in display_field.value){
        if(l.indexOf(display_field.value[i])==-1){
            alert("You cannot enter those characters!!!");
            display_field.value="";
        }
    }
}