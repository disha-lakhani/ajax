<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    welcome <?php echo $_POST["name"]; ?><br>
    your email address is : <?php echo $_POST["email"]; ?>
</body>
</html>

<script>
        $("#proform").validate({
            rules:{
                name:{
                    required:true,
                    minlength:2
                },
                price:{
                    required:true,
                    minlength:2
                },
                category:{
                    required:true,
                    minlength:2
                }
            },
            messages:{
                name:{
                    required:"please enter product name",
                    minlength:"product name must consist of at least 2 characters"
                },
                price:{
                    required:"please enter price..",
                    minlength:"price must consist of at least 2 number"
                },
                category:{
                    required:"please enter product category..",
                    minlength:"category must consist of at least 2 characters"
                }
            }
        });
    </script>