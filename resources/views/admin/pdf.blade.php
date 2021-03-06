<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <style type="text/css">
        
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Poppins:100,200,300,400,500,600,700,800,900&display=swap');
        /* Global CSS */
        html{
            scroll-behavior: smooth;
        }
        body{
            /*background: #525659;*/
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #333333; 
        }
        h1, h2, h3, h4, h5, h6{
            font-family: 'Montserrat', sans-serif;
        }
        p{
            font-family: 'Poppins', sans-serif;
            color: #333333;     
        }
        .img-fluid{
            max-width: 100%;
            height: auto;
        }

        .section-one{
            background: #fff;
            width: 700px;
            display: block;
            margin: 0 auto;
            margin-top: 60px;
            padding: 50px;
        }
        .one{
            padding: 10px 35px 0px 35px;
        }
        .section-one p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one h2{
            font-size: 36px;
            text-transform: uppercase;
            font-weight: 700;
            color: #fff;
            text-align: right;
            padding: 15px 10px;
            margin: 0;
        }

        .section-one .two h1{
            color: #283592;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 0;
            padding-left: 0;
            margin-top: 0px;
        }
        .section-one .two p{
            color: #ec3485;
            font-weight: 700;
            font-size: 14px;
            margin: 0px;
        }
        .section-one .two .service{
            color: #434343;
            font-weight: 700;
        }
        .section-one .three p{
            color: #434343;
            font-size: 13px;
            margin-top: -2px;
            font-weight: 500;
        }
        .section-one .pad h4{
            margin-top: 0px;
        }
        .section-two{
            background: #fff;
            width: 800px;
            display: block;
            margin: 0 auto;
            padding: 0px 50px 30px 50px;
        }
        .two{
            padding: 0px 35px;
        }
        .section-two h2{
            color: #283592;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 0;
        }
        .section-two p{
            color: #ec3485;
            font-weight: 700;
            font-size: 14px;
        }
        .section-two .serv{
            margin-bottom: 0;
        }
        .section-two .service{
            color: #434343;
            font-weight: 700;
        }

        .table{
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            /*border-spacing: 0;*/
            /*border: solid 10px black;*/
            border-collapse: collapse;
        }

        .table .thead-dark th {
            font-size: 14px;
            background: #2c0b75;
            color: #fff;
            padding: 8px 0px;
        }
        .table-bordered th {
            font-size: 14px;
            padding: 10px 0px;
            color: #2c0b75;
        }
        .table-bordered td {
            font-size: 14px;
            color: #2c0b75;
        }
        .table-bordered th {
            border: solid 1px #dee2e6;
            text-align: center;
        }
        .table-bordered td {
            border: solid 1px #dee2e6;
            text-align: left;
            padding-left: 10%;
        }
        .table .thead-dark th {
            font-size: 14px;
        }
        .table-bordered th {
            font-size: 14px;
            font-weight: 500;
        }
        .table-bordered td {
            font-size: 14px;
            font-weight: 600;
            width: 50%;
            font-size: 16px;
        }


        .section-one .four p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one .four h5{
            margin-top: -15px;
        }

        @media (max-width: 767.98px){
            .section-one{
                padding: 30px 10px 0px 10px;
                width: 100%;
                margin-top: 0px;
            }
            .section-one .col-md-2{
                width: 0%;
            }
            
            .one {
                
                padding: 20px 0px 0px 0px;
            }
            .section-one img {
                width: 200px;
                padding-bottom: 15px;
            }
            .section-one h2 {
                font-size: 19px;
            }

            .two {
                padding: 0px 0px;
            }


            .table .thead-dark th {
                font-size: 12px;
            }
            .table-bordered th {
                font-size: 12px;
            }
            .table-bordered {
                margin-left: -5px;
            }


        }

    </style>

  </head>

  <body>

    <section class="section-one">
        <div class="container">
            <div class="row one">

                <table width="100%">
                        <tr>
                            <td align="center">
                                <img src="{{ asset('receipt/logo.png') }}" style="width: 25%;">
                            </td>
                        </tr>
                </table>
                <table width="100%" style="
                                                    background: #eeefef;
                                                    padding: 10px 5px 5px 5px;
                                                ">
                        <tr>
                            <td align="left" style="width: 40%">
                                <h1 style="margin: 0; color: #2c0b75; font-size: 1.5em">Diplomacy Key LLC</h1>
                            </td>
                            <td align="center" style="width: 20%">
                                <img src="{{ asset('receipt/favicon.PNG') }}" style="width: 33%;">
                            </td>
                            <td align="left" style="width: 40%">
                                <h1 style="margin: 0; color: #2c0b75; font-size: 1.5em">Balance Sheet</h1>
                            </td>
                        </tr>
                </table>

                <table width="100%" style="padding-top: 25px;">
                        <tr class="three">
                            <td align="left" style="width: 25%;vertical-align: top;">
                                <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">Office Address:</h5>
                            </td>
                            <td align="left" style="width: 40%;vertical-align: top;">
                                <p>21/C, Dubai, Ubited Arab Emirates</p>
                            </td>
                        </tr>
                </table>

                <table width="100%">
                        <tr class="three">
                            <td align="left" style="width: 25%;vertical-align: top;">
                                <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">CONTACT NUMBER:</h5>
                            </td>
                            <td align="left" style="width: 40%;vertical-align: top;">
                                <p>9978873838833</p>
                            </td>
                        </tr>
                </table>

                <table class="table table-bordered" width="100%" border="1px solid black" style="">
                      <thead class="thead-dark">
                      </thead>
                      <tbody>
                        <tr>      
                          <td style="text-align: center;">Amount Received</td>
                          <td style="text-align: center;"></td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">Total Amount Received</td>         
                          <td style="text-align: center;"></td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">Balance Due</td>
                          <td style="text-align: center;"></td>
                        </tr>
                        
                      </tbody>
                    </table>

                    <table width="100%">
                        <tr class="three">
                            <td align="left" style="width: 15%;vertical-align: top;padding-top: 15px;">
                            <h5 style="margin-top: 0;color: #2c0b75;
                                ">Signed By:</h5>
                            </td>
                            <td align="left" style="width: 85%;vertical-align: top; padding-top: 15px;">
                                <p></p>
                            </td>
                        </tr>
                    </table>
            </div>  
        </div>
    </section>

  </body>
</html>