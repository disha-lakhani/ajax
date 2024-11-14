$(document).ready(function () {
    $("#demo").hide()
    $("#demo1").hide()
    $("#text1").hide()
    $("#demo3").hide()
    $("#demo4").hide()
    $("#demo5").hide()
    $("#demo7").hide()
    $("#data").submit(function(e){
        e.preventDefault()
        let email=$("#email").val()
        let country=$("#country").val()
        let firstname=$("#firstname").val()
        let lastname=$("#lastname").val()
        let city=$("#city").val()
        let password=$("#password").val()
        console.log(email);
          let isvalid=true
        if(email.length == ""|| firstname =="" || lastname== "" || country =="" || $('input[name="gender"]:checked').length === 0 || city == "" || password.length==""){
            $("#demo").show()
            $("#text1").show()
            $("#demo1").show()
            $("#demo3").show()
            $("#demo4").show()
            $("#demo5").show()
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
        $("#demo").hide()
        $("#text1").hide()
        $("#demo1").hide()
        $("#demo3").hide()
        $("#demo4").hide()
        $("#demo7").hide()
        $("#demo5").hide()
       
        //  let regpassword = /^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%&*]{6,20}$/
        // if (!regpassword.test(password)) {
        //   $("#demo5").show()
        //   $("#demo5").html("please valid password")
        // isvalid = false
        // }
        //  else{
        //     $("#demo5").hide()
        // }
      }
      }

      if (isvalid) {
        $("#data").unbind('submit').submit(); 
    }
  

     
    })
   
})

