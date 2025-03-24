$(document).ready(function(){
    $.ajax({
        method:"POST",
        url:"total.php",
        success:function(html){
            $(".total").html(html)
            // alert("hello")
        },
        error:function(){
            alert("error")
        }
    })
    path = window.location.pathname
    if(path == "/Friendbox/friends.php"){
        $.ajax({
            method:"POST",
            url:"allfriends.php",
            success:function(html){
                $("#frends").html(html)
            },
            error:function(){
                alert("error")
            }
        })
        if(path == "/Friendbox/friends.php"){
            $.ajax({
                method:"POST",
                url:"followers.php",
                success:function(html){
                    $("#frends-req").html(html)
                },
                error:function(){
                    alert("error")
                }
            })
        }
    }

    $.ajax({
        method:"POST",
        url:"suggestionsdata.php",
        success:function(html){
            $(".suggestions").html(html)
        },
        error:function(){
            alert("error")
        }
    })

    
    $.ajax({
        method:"POST",
        url:"indexfeed.php",
        success:function(html){
            $(".loadMore").html(html)
        },
        error:function(){
            alert("error")
        }
    })
        
  });