<!doctype html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>遊記專區</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <style>
        body{
            font-family: 'Pangolin', cursive;
        }

        #bodydiv{
          padding-left: 50px;
        }
    </style>
</head>
<body style="background-color:#ebebeb">
    <div>
        <form name="form_name" id="form_name">
            <!--radio用法-->
            <label><input name="language" type="radio" value="繁中" checked>繁中</label>
            <label><input name="language" type="radio" value="韓文">韓文</label>
            <label><input name="language" type="radio" value="日文">日文</label>
            <br>
            <!--select用法-->

            <select name="country">
                <option value="台灣">台灣</option>
                <option value="韓國">韓國</option>
                <option value="日本">日本</option>
            </select>
            <button onclick="getCountry()">取得Radio和Select</button>
        </form>
    </div>
    <div id="screen">
    </div>
        <input type="text" id="input">
        <button onclick="WriteOnScreen()">寫入內容到DIV中</button>
        <button onclick="WriteValue()">寫入內容到INPUT中</button>
        <button onclick="ShowOnScreen()">讀取DIV的內容</button>
        <button onclick="ShowValue()">讀取Input的內容</button>
    <script>
            function getCountry(){
                //  讀取radio的值
                var form = document.getElementById("form_name");
                for(var i=0; i<form.language.length;i++){
                    if(form.language[i].checked){
                        var language = form.language[i].value;
                        alert(language);
                    }
                }
                //  讀取select的值
                var country = form.country.value;
                alert(country);
            }
    //  寫入內容到HTML元素中
            //  寫入內容到INPUT
            function WriteValue(){                              
                document.getElementById("input").value="12345";
            }
            //  寫入內容到DIV或SPAN
            function WriteOnScreen(){                             
                document.getElementById("screen").innerHTML = "2+3"
            }

    //  讀取HTML元素
             //讀取INPUT的內容
            function ShowValue(){                               
                var v = document.getElementById("input").value ;
                alert(v);
            }
             //讀取DIV或SPAN的內容
            function ShowOnScreen(){                            
                var v = document.getElementById("screen")
                alert(v.innerHTML);
            }
        </script>
</body>
</html>