function reload(){
    $.ajax({
        method:"POST",
        url:"total.php",
        success:function(html){
            $(".total").html(html)
        },
        error:function(){
            alert("error")
        }
    })
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
}

$(".like").on('click',(e)=>{
    likedpost = e.target.nextElementSibling.value
    console.log(likedpost)
    $.post("like.php",
    {
        pid:likedpost
    },
    function(){
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
    }
    
    )
   
})

$(".addbtn").click((e)=>{
    adduser = e.target.value
    $.post("addfriends.php",
    {
        user:adduser
    },
    function(){
       reload()
    }
    
    ) 
})

// unfriend user from followings

$(".unfriend").click((e)=>{
    removeuser = e.target.value
    // alert("unfriend")
    $.post("unfriend.php",
    {
        user:removeuser
    },
    function(){
        reload()
    }
    
    ) 
})

// remove user from followers

$(".remove").click((e)=>{
    removeuser = e.target.value
    $.post("remove.php",
    {
        remove:removeuser
    },
    function(){
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
        $.ajax({
            method:"POST",
            url:"total.php",
            success:function(html){
                $(".total").html(html)
                $('.followers a').addClass("active")
                $('.followings a').removeClass("active")
            },
            error:function(){
                alert("error")
            }
        })
    }
    
    ) 
})