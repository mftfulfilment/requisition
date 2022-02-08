<!DOCTYPE html>
<html>

<head>
    <title>Requisition Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        .error {
            color: red;
        }

        h3,
        h1 {
            animation: bounce;
            animation-duration: 2s;
        }

        h1.tittle {
            font-family: 'Times New Roman', serif;
            margin-top: 30px;
            margin-left: 80px;
            font-size: 50px;
        }

        form {
            margin-top: 50px;
            margin-right: 100px;
            margin-left: 50px;
            margin-bottom: 100px;
            animation-delay: 0.5s;
        }

        .has-error {
            border-color: #cc0000;
            background-color: #ffff99;
        }

        .reload {
            font-family: Lucida Sans Unicode
        }

        .fa-plus,
        .fa-trash-alt {
            color: #F3F2F8;
        }

        .cancel {
            align-items: end;
            margin-left: 100px;
            margin-right: 200px;
            border: 2px solid #2E0FC5;
            color: #2E0FC5;
        }

        .cancel:hover {
            background: #2E0FC5;
            color: white;
        }

        .submit {
            border: 2px solid #FAB706;
            color: #FAB706;
        }

        .submit:hover {
            background: #FAB706;
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<body>
    <div class="card card-nav-tabs card-plain container shadow" style="padding-bottom: 100px; margin-top: 40px;">
        <div class="card-header card-header-danger">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs justify-content-end" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home" data-toggle="tab">Company's Requisistions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#updates" data-toggle="tab">Agent's Requisition</a>
                        </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link" href="/index2">View requisitions</a>
                            @endauth
                            @guest
                            <a href="/login" class="nav-link">Login</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://mftfulfillmentcentre.com/images/logo.png" height="150" width="200"
                                    style="    margin-left: 30px;" alt="MFT fulfillment Center">
                            </div>
                            <div class="col-md 9">
                                <h1 class="tittle">REQUISITION FORM</h1>
                            </div>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{route('store')}}" id="requisitionForm" name="requisitionForm" method="post"
                            autocomplete="off">
                            {{-- {{csrf_field()}} --}}
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="date">Date</label>
                                        <input type="text" class="form-control" name="Date" value="{{old('Date')}}"
                                            id="currentDate" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>

                            </div>

                            <H5>Requisiter Info.</H5>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="name">Name</label><span style="color:#ff0000">*</span>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label for="department">Department</label>
                                        <select class="custom-select" name="department" value="{{old('department')}}">
                                            <option>Select One</option>
                                            <option value="business@mftfulfillmentcentre.com">Business Development
                                            </option>
                                            <option value="beverly.mft@gmail.com">Customer Service/Call Center</option>
                                            <option value="financeoffice@mftfulfillmentcentre.com">Finance</option>
                                            <option value="support@mftfulfillmentcentre.com">I.T</option>
                                            <option value="operationske@mftfulfillmentcentre.com">Operations</option>
                                            <option value="operationske@mftfulfillmentcentre.com">Warehouse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label for="email">Email</label><span style="color:#ff0000">*</span>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class=" form-group">
                                        <label for="Country">Country</label>
                                        <select class="custom-select" name="Country">
                                            <option>Select One</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Ghana">Ghana</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <h5>Recommended Vendor Info.</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="VendorName">Vendor Name</label>
                                        <input type="text" class="form-control" name="vendor_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="VendorAddress">Vendor Address</label>
                                        <input type="text" class="form-control" name="vendor_address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="VendorPhone">Vendor Phone Number</label>
                                        <input type="tel" class="form-control" name="vendor_phone">
                                    </div>
                                </div>
                            </div>
                            <h5>Materials required</h5>
                            <div class="table-responsive-md">
                                <table class="table table-bordered table-sm" id="materialsTable">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-3">Item<span style="color:#ff0000">*</span></th>
                                            <th scope="col-md-4">Description & Size</th>
                                            <th scope="col-md-1">Quantity<span style="color:#ff0000">*</span></th>
                                            <th scope="col-md-1">Cost<span style="color:#ff0000">*</span></th>
                                            <th scope="col-md-2">Total</th>
                                            <th scope="col-md 1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="Item[]" value="{{old('Item[]')}}">
                                                <span class="text-danger">{{ $errors->first('Item') }}</span>

                                            </td>
                                            <td>
                                                <input type="text" name="description[]"
                                                    value="{{old('description[]')}}">
                                                <span class="text-danger">{{ $errors->first('description') }}</span>

                                            </td>
                                            <td>
                                                <input type="number" name="quantity[]" class="quantity"
                                                    value="{{old('quantity[]')}}">
                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>

                                            </td>
                                            <td>
                                                <input type="number" name="cost[]" class="cost"
                                                    value="{{old('cost[]')}}">
                                                <span class="text-danger">{{ $errors->first('cost') }}</span>

                                            </td>
                                            <td>
                                                <input type="number" name="total[]" class="total"
                                                    value="{{old('total[]')}}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm  servicedeletebtn"
                                                    style="background-color: #F90535;">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>TOTAL</td>
                                        <td><b class="totals"></b></td>
                                        <td>
                                            <button type="button" class="btn btn-sm addRow"
                                                style="background-color: #3A26B8;">
                                                <i class="fa fa-plus"></i>
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="btn cancel card shadow" value="Cancel" type="reset">
                                </div>
                                <div class="col-md-6">

                                    <input type="submit" class="btn submit" value="Submit" id="reqform">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="updates">
                    <div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://mftfulfillmentcentre.com/images/logo.png" height="150" width="200"
                                    style="    margin-left: 30px;" alt="MFT fulfillment Center">
                            </div>
                            <div class="col-md 9">
                                <h1 class="tittle"> AGENTS REQUISITION</h1>
                            </div>
                        </div>

                        @if(session('success2'))
                        <div class="alert alert-success">
                            {{ session('success2') }}
                        </div>
                        @endif

                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{route('store2')}}" id="" name="" method="post" autocomplete="off">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="date">Date</label>
                                        <input type="text" class="form-control" name="Date" id="currentDate" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>


                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label>Requisition No.</label>
                                        <input type="number" class="form-control" name="requisitionNo">
                                    </div>
                                </div>
                            </div>

                            <H5>Agent</H5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="AgentName">Agent Name</label><span style="color:#ff0000">*</span>
                                        <input type="text" class="form-control" name="AgentName">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="region">Agent's Region</label>
                                        <select class="custom-select" name="region">
                                            <option>Select One</option>
                                            <option>Kisumu</option>
                                            <option>Turkana</option>
                                            <option>Migori</option>
                                            <option>Eldoret</option>
                                        </select>
                                    </div>AgentPhone
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="AgentPhone">Agent's Phone number</label><span style="color:#ff0000">*</span>
                                        <input type="tel" class="form-control" name="AgentPhone">
                                    </div>
                                </div>
                            </div>

                            <h5>Requisitioner:</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ReqName">Requisitioner Name</label>
                                        <input type="text" class="form-control" name="RequisitionerName">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="RequisitionerEmail">Requisitioner Email</label>
                                        <input type="email" class="form-control" name="RequisitionerEmail">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="RequisitionerPhone">Requisitioner Phone Number</label>
                                        <input type="tel" class="form-control" name="RequisitionerPhone">
                                    </div>
                                </div>
                            </div>
                            <h5>Cost of transport:</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="transportCost">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">QTY<span style="color:#ff0000">*</span></th>
                                            <th scope="col-md-1">Order ID</th>
                                            <th scope="col-md-2">From</th>
                                            <th scope="col-md-2">To</th>
                                            <th scope="col-md-1">Airtime</th>
                                            <th scope="col-md-1">Amount</th>
                                            <th scope="col-md-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="number" name="QTY[]">
                                            </td>
                                            <td>
                                                <input type="text" name="orderID[]">
                                            </td>
                                            <td>
                                                <input type="text" name="from[]">
                                            </td>
                                            <td>
                                                <input type="text" name="to[]">
                                            </td>
                                            <td>
                                                <input type="number" name="airtime[]">
                                            </td>
                                            <td>
                                                <input type="number" name="amount[]">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm  servicedeletebtn"
                                                    style="background-color: #F90535;">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>TOTAL</td>
                                        <td><b class="totals"></b></td>
                                        <td>
                                            <button type="button" class="btn btn-sm agentAddRow"
                                                style="background-color: #3A26B8;">
                                                <i class="fa fa-plus"></i>
                                        </td>

                                    </tfoot>
                                </table>
                            </div>

                            <div class="row" style="margin-top: 30px;">

                            </div>

                            <div class="row" style="margin-left: 400px; margin-top: 40px;">

                                <input class="btn cancel card shadow" value="Cancel" type="reset">
                                <input type="submit" class="btn submit" value="Submit" id="reqform">



                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="history">
                    <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this
                        is the level that things could be at. I will be the leader of a company that ends up being worth
                        billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think
                        that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the
                        level that things could be at.</p>
                </div>
            </div>
        </div>
    </div>


    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = dd + '/' + mm + '/'  + yyyy;
        document.write(today);
      document.getElementById("currentDate").value = today;
		$(document).ready(function() {
		    $('tbody').on('click','.servicedeletebtn',function(e)
			{
				e.preventDefault();
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this requisition!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
							$(this).parent().parent().remove();
						swal("Poof! Your requisition has been deleted!", {
						icon: "success",
						});
					} else {
						swal("Your requsition is safe!");
					}
					});
			});
		});
		$('.addRow').on('click',function()
		{
		 addRow();
		});

		function addRow()
		{
			var tr='<tr>'+
					'<td>'+
						'<input type="text" name="Item[]">'+
					'</td>'+
					'<td>'+
						'<input type="text" name="description[]">'+
					'</td>'+
					'<td>'+
						'<input type="number" name="quantity[]" class="quantity">'+
					'</td>'+
					'<td>'+
						'<input type="number" name="cost[]" class="cost">'+
					'</td>'+
					'<td>'+
						'<input type="number" name="total[]" class="total">'+
					'</td>'+
					'<td>'+
		 				'<button type="button" class="btn btn-sm servicedeletebtn" style="background-color: #F90535;">'+
                       '<i class="fa fa-trash-alt"></i>'+
					   '</button>'+
					'</td>'+
				'</tr>';
				$('tbody').append(tr);
		};
		$('tbody').delegate('.quantity,.cost','keyup',function()
		{
			var tr=$(this).parent().parent();
			var quantity=tr.find('.quantity').val();
			var cost=tr.find('.cost').val();
			var total=(quantity*cost);
			tr.find('.total').val(total);
			totals();
		});
		function totals()
		{
			var totals=0;
			$('.total').each(function (i,e)
			{
				var total=$(this).val()-0;
				totals +=total;
			});
			$('.totals').html(totals);
		}
		$('.agentAddRow').on('click',function()
		{
		  agentAddRow();
		});
		function agentAddRow()
		{
			var tr2='<tr>'+
						'<td>'+
							'<input type="number" name="QTY[]">'+
						'</td>'+
						'<td>'+
							'<input type="text" name="orderID[]">'+
						'</td>'+
						'<td>'+
							'<input type="text" name="from[]">'+
						'</td>'+
						'<td>'+
							'<input type="text" name="to[]">'+
						'</td>'+
						'<td>'+
							'<input type="number" name="airtime[]">'+
						'</td>'+
						'<td>'+
							'<input type="number" name="amount[]">'+
						'</td>'+
						'<td>'+
							'<button type="button" class="btn btn-sm  servicedeletebtn"  style="background-color: #F90535;">'+
							  '<i class="fa fa-trash-alt"></i>'+
						   '</button>'+
						'</td>'+
					'</tr>';
				$('tbody').append(tr2);
		};
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="script.js"></script>-->
</body>

</html>
