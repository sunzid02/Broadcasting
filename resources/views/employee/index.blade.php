<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
</head>
<body>

    <!--starts add  Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <form action="{{ route('employee.store') }}" method="POST">
                    
                    @csrf
                    <div class="modal-body">
                    
                    

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter first name">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control"  name="lname" placeholder="last name">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="address">
                            </div>

                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control"  name="mobile" placeholder="mobile">
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--end add  Modal -->





    <div class="container">
        <h1> Laravel CRUD: with Bootstrap Modal</h1>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            
            <div class="alert alert-success">
                <p>
                    {{ Session::get('success') }}
                </p>
            </div>
        
            
        @endif




        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"> Employee</i>
        </button>

        <br>
        <br>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> First Name </th>
                    <th scope="col"> Last Name </th>
                    <th scope="col"> Address </th>
                    <th scope="col"> Mobile No </th>
                    <th scope="col"> Action </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> First Name </th>
                    <th scope="col"> Last Name </th>
                    <th scope="col"> Address </th>
                    <th scope="col"> Mobile No </th>
                    <th scope="col"> Action </th>
                </tr>
            </tfoot>
            <tbody>
                
                @foreach ($emps as $emp)
                    <tr>
                        <td scope="row"> {{ $emp->id }} </td>
                        <td scope="row"> {{ $emp->fname }} </td>
                        <td scope="row"> {{ $emp->lname }} </td>
                        <td scope="row"> {{ $emp->address }} </td>
                        <td scope="row"> {{ $emp->mobile }} </td>
                        <td scope="row">
                            <a href="" class="btn btn-primary"> Edit </a> 
                            <a href="" class="btn btn-danger"> Delete </a> 
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>









    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>