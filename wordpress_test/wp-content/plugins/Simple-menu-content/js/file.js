jQuery(function($){


    var testing = jQuery.parseJSON(myAjax.data_post);


    let j = 0;
    var width_active_percentage = 0;
    var width_percentage = 0;
    var width_a = width_hr = 100/testing.length;

    for(let i = 0; i < testing.length; i++) {
        var obj = testing[i];
        
        j++;
        $(".simple-content-menu ul").append('<li class="post'+j+'"><a href="'+obj.url+'">'+obj.title+'</a></li>')

        
        if(obj.id==myAjax.active_id){
            width_active_percentage = (100 * j / testing.length)-width_hr;
        }
       
    }
    $(".simple-content-menu ul").append('<hr/>')

    var style = document.createElement('style');
    
    document.head.appendChild(style);
    if(myAjax.active_id%2==0){
        style.sheet.insertRule('.simple-ul {background: grey;}');
    }else{
        style.sheet.insertRule('.simple-ul {background: white;}');
    }
    
    
    style.sheet.insertRule('.simple-content-menu a {display: inline-block;width: '+width_a+'%;padding: .75rem 0;margin: 0;text-decoration: none;color: #333;}'); 
    style.sheet.insertRule('.simple-content-menu hr {height: .5rem;width: '+width_hr+'%;margin-top: 0;margin-bottom: 0;margin-right: 0;margin-left:'+width_active_percentage+'%;background: blue;border: none;transition: .3s ease-in-out;}');
    j = 0;
    for(let i=0;i<testing.length;i++){
        j++;
        width_percentage = (100 * j / testing.length)-width_hr;
        var pos = 'post'+(j);
        style.sheet.insertRule('.'+pos+' a:hover {background: #b8b4ab;}');

        style.sheet.insertRule('.'+pos+':hover ~ hr  {margin-left: '+width_percentage+'%;}');
    }

    
});