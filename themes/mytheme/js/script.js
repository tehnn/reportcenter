function onBtn1_click(){
    
    $.ajax({
        url: 'index.php?r=Ajax/LoadGrid',
        //dataType:'json',
        success: function(data) {
            $('#div-grid').html(data);
        }
    });

    return false;
    
}

