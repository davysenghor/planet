<!DOCTYPE html>
<html lang="en">
    <head>
        
        

    <title>http://estateservicing.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery library -->
    <script src="/admin/js/jquery-1.11.1.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/admin/css/bootstrap.3.3.0.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/admin/js/bootstrap.3.3.0.min.js"></script>       

    <link rel="stylesheet" href="/admin/css/jquery.dataTables.min.css">
    <script src="/admin/js/jquery.dataTables.min.js"></script>   

   
        
        
           
        
    </head>
    <body class="body-green" data-elink-extension-installed="1.1.5">

        

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Estate&nbsp;Servicing - Admin Area</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="report_customer_list_view.php">Customer List View</a></li>
                        <li><a href="report_customer_list_download.php">Customer List Download</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <br>
    <br>
    <br>
    <div class="header"><h1>Report Customer List View</h1></div>
    <br>

    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>id_houses</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>                
                <th>Bedroom</th>
                <th>Bathroom</th>
                <th>Square Footage</th>
                <th>Basement</th>
                <th>Sewer</th>
                <th>Condition</th>                
                <th>Situation</th>
                <th>Sell Stay Home</th>
                <th>Register Date</th>
            </tr>
        </thead>
    </table>         

           

         
        

        

        
        <script type="text/javascript" language="javascript" >

            $(document).ready(function () {
                $('#example').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "columnDefs": [{
                            // The `data` parameter refers to the data for the cell (defined by the
                            // `data` option, which defaults to the column being worked with, in
                            // this case `data: 0`.
                            "render": function (data, type, row) {
                                return '<a href="comments.php?id=' + row[0] + '">' + row[1] + '</a>';
                            },
                            "targets": 1
                        },
                        {"visible": false, "targets": [0]}
                    ],
                    ajax: {
                        url: "server-side-data.php",
                        type: "POST"
                    }

                });
            });
            
/*
 * TO DEBUG DATA TABLES USE THIS FUNCTION BELLOW
 */

//            (function () {
//            var url = '//debug.datatables.net/bookmarklet/DT_Debug.js';
//            if (typeof DT_Debug != 'undefined') {
//              if (DT_Debug.instance !== null) {
//                    DT_Debug.close();
//                } else {
//                new DT_Debug();
//                }
//            } else {
//                var n = document.createElement('script');
//                n.setAttribute('language', 'JavaScript');
//                n.setAttribute('src', url + '?rand=' + new Date().getTime());
//                document.body.appendChild(n);
//                }
//            }
//            )(); 

        </script>
    


        
    </body>  
</html>