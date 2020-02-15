<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lucky Draw</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href='http://mywebfont.appspot.com/css?font=zawgyi' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    </head>
    <body>
        <!-- particles.js container --> 
        <!-- <div id="particles-js"></div> -->

        <!-- <div class="flex-center position-ref full-height"> -->
            <div class="container" style="margin-top: 50px">
                <h3>Position Shortcuts</h3>
                <br>
                <h5>[ Dir = Director ] || [ Con = Controller ] || [ SV = Supervisors of every department] || [ IA = Internal Auditor ] || [ AS = Assitants of all department ] <br><br>
                    [ HD = Heads of all department ] || [ MNG = Managers of all department ] || [ IE = IT Engineer ] || [ TRN = Trainers/Trainees ] || [ ANA = Analyst ]  <br><br>
                    [ IC = Store Incharge ] || [ PHA = Pharminsist ] || [ GD = Graphic Designer ] || [ INT = Intern ] || [ ACT = Accountant ] </h5>
                    <br><br><hr>    
                <h3>Winners list</h3>
                <table class="table table-bordered" id="winners">
                    <thead>
                        <tr>
                            <th scope="col">Price [#]</th>
                            <th scope="col">Name [Dept]</th>
                            <!-- <th scope="col">Dept</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lucky_draws as $each)
                            <tr>
                                <td>
                                    {{ $each->name }} [ {{ $each->number }} ] 

                                    @if($each->special_number)
                                        <span class="badge badge-secondary">Top: {{ $each->special_number }}</span>
                                    @endif
                                </td>
                                <td>{{ $each->staff->name }} [ {{ $each->staff->position }} ]</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- </div> -->

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#winners').DataTable({
                    "paging": false,
                    "ordering": false
                });
            });
        </script>
    </body>
</html>
