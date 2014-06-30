var cs=0;

$('body').delegate('#cs_sel','change',function(){
    cs=1;
});

$('body').delegate('#ep_form','submit',function(){
    if(cs===0){
        if(!confirm('Не забудьте про статус')) return false;
      
    }
});

