$(document).ready(function () {
    $("#demo1").hide();
    $("#demo2").hide();
    $("#demo3").hide();
    $("#demo4").hide();
    $("#demo5").hide();

    $("#empform").submit(function (e) {
        e.preventDefault();
        let ename = $("#ename").val().trim();
        let email = $("#email").val().trim();
        let contact = $("#contact").val().trim();
        let salary = $("#salary").val().trim();
        let dept = $("#dept").val().trim();

        let isvalid = true;

        if (ename.length ===0) {
            $("#demo1").show();
            isvalid = false;
        }
        else {
            $("#demo1").hide();
        }

        let emailvali = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
        if (!emailvali.test(email)) {
            $("#demo2").show();

            isvalid = false;
        }
        else {
            $("#demo2").hide();
        }
        if (contact.length === 0) {
            $("#demo3").show();
            isvalid = false;
        }
        else if (contact.length !== 10) {
            $("#demo3").show();
            isvalid = false;
        }
        else {
            $("#demo3").hide();
        }

        if (salary.length ===0) {
            $("#demo4").show();
            isvalid = false;
        }
        else {
            $("#demo4").hide();
        }
        if (dept.length ===0) {
            $("#demo5").show();
            isvalid = false;
        }
        else {
            $("#demo5").hide();
        }
        if (isvalid) {
            $("#empform").unbind('submit').submit();
        }
    })
})