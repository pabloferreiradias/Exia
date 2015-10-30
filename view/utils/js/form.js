function populateForm(frm, data) {
    $.each(data, function(key, value){  
        var $ctrl = $('[name='+key+']', frm);
        console.log(key+" "+value);
        if($ctrl.is('select')){
            $("option",$ctrl).each(function(){
                if (this.value==value) { this.selected=true; }
            });
        }
        else {
            switch($ctrl.attr("type"))  
            {  
                case "text" :   case "hidden":  case "textarea":  case "date":
                $ctrl.val(value);   
                break;   
                case "radio" : case "checkbox":   
                $ctrl.each(function(){
                    if($(this).attr('value') == value) {  $(this).attr("checked",value); } });   
                break;
            } 
        } 
    });
}