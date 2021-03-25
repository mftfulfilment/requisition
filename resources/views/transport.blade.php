<!DOCTYPE html>
<html>

<head>
    <title>Requisition Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="icon" href="/logo/logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <style type="text/css">
        h1.tittle {
            font-family: 'Times New Roman', serif;
            margin-top: 30px;
            margin-left: 100px;
            font-size: 50px;
        }

        form {
            margin-top: 50px;
            margin-right: 100px;
            margin-left: 50px;
            margin-bottom: 100px;
            animation-delay: 0.5s;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>

    </script>

</head>

<body>
    <img src="https://mftfulfillmentcentre.com/images/logo.png" class="center" />


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 style="float: left;">AGENT  REQUISITIONS MADE BY: <b>{{ $transport->agents->RequisitionerName }}</b></h3>
                        <a class="btn btn-primary" href="/index2" style="float: right">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="table tabl">
                            <thead>
                                <tr>
                                    <th>Requisition_id</th>
                                    <th>orderID</th>
                                    <th>from</th>
                                    <th>to</th>
                                    <th>airtime</th>
                                    <th>amount</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>{{$transport['requisition_id']}}</td>
                                    <td>{{$transport['orderID']}}</td>
                                    <td>{{$transport['from']}}</td>
                                    <td>{{$transport['to']}}</td>
                                    <td>{{$transport['airtime']}}</td>
                                    <td>{{$transport['amount']}}</td>
                                </tr>



                            </tbody>
                            <tfoot>

                                @if(strtolower($transport->feedback)=="Notdisbursed")
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td><a class="btn btn-danger" href="/disapprove/{{$commonId}}">Disapprove</a></td>
                                    <td><a class="btn btn-success" href="/approve/{{$commonId}}">Disburse</a></td>
                                </tr>
                                @endif

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
