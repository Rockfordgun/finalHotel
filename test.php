<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Bootstrap Datepicker</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
</head>


<body>

    <div class="NinjaCont">
        <h1>CodingNinjas</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" style="cursor: pointer;"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text">Pick a date fellow Ninja!</div>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzRH_HN5yt91p9oa385FIF2j2qkpUpec5V6zYal_oNuqsAaHyt6P4ZIoCKtP_4FvWC6gI&usqp=CAU" alt="" />
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                startDate: '01-01-2023',
                endDate: '01-01-2024'
            });
        });
    </script>

</body>

</html>