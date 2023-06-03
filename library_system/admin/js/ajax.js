function showhome1(){

    $.ajax({
        url:"includes/home1.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('#layoutSidenav_content').html(data);
        }
    });

}



function showtable(){

    $.ajax({
        url:"includes/home2.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('#layoutSidenav_content').html(data);
        }
    });

}





function showrack(){

    $.ajax({
        url:"includes/home3.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('#layoutSidenav_content').html(data);
        }
    });

}

function showhome4(){

    $.ajax({
        url:"includes/home4.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('#layoutSidenav_content').html(data);
        }
    });

}

function showhome5(){

    $.ajax({
        url:"includes/home5.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('#layoutSidenav_content').html(data);
        }
    });

}

function showhome6(){

    $.ajax({
        url:"includes/home6.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('#layoutSidenav_content').html(data);
        }
    });

}
