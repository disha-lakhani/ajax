$(document).ready(function () {
    $("#demo1").hide()
    $("#demo2").hide()
    $("#demo3").hide()
    $("#demo4").hide()
    $("#demo5").hide()
    $("#demo6").hide()
    $("#demo7").hide()
    $("#data").submit(function(e){
        e.preventDefault()
        let email=$("#email").val()
        let address=$("#address").val()
        let firstname=$("#firstname").val()
        let lastname=$("#lastname").val()
        
        let course=$("#course").val()
        let pincode=$("#pincode").val()
        console.log(email);
          let isvalid=true
        if(email.length == ""|| firstname =="" || lastname== "" || address =="" || $('input[name="gender"]:checked').length === 0 || course == "" || pincode.length==""){
            $("#demo1").show()
            $("#demo2").show()
            $("#demo3").show()
            $("#demo4").show()
            $("#demo5").show()
            $("#demo6").show()
            $("#demo7").show()
            isvalid=false
            
        }
        else{
            let emailvali = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
      if (!emailvali.test(email)) {
        $("#demo").show()
        $("#demo").html("please enter valid email")
        isvalid=false
    
      }
      else{
        $("#demo1").hide()
        $("#demo2").hide()
        $("#demo3").hide()
        $("#demo4").hide()
        $("#demo6").hide()
        $("#demo7").hide()
       
        // let regex = new RegExp=/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/;
        if (pincode.length<6 || pincode.length>6) {
            $("#demo5").show()
            $("#demo5").html("Only enter Six digit");
            isvalid=false
        }
        else{
            $("#demo5").hide()
        }
      }
      }

      if (isvalid) {
        $("#data").unbind('submit').submit(); 
    }
  

     
    })
   
})

