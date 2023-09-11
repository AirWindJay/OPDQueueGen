@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12" align="center">
            <h1>OPD QUEUE GENERATOR</h1>
        </div>
        <div class="col-md-6" id="newpatdiv">
            <div class="card" align="center">
                <div class="card-body">
                    <button class="btn btn-warning" onclick="newpatadd()" style="border: 5px solid black;">
                        <h1 style="font-size: 50px; font-family: Arial Black, Gadget, sans-serif;">New Patient<br>(Registration Area)</h1>
                        <div id="newpat"  style="font-size: 100px; width: 500px; height: 500; font-family: Arial Black, Gadget, sans-serif;">
                            #
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="oldpatdiv">
            <div class="card" align="center">
                <div class="card-body">
                    <button class="btn btn-info" onclick="oldpatadd()" style="border: 5px solid black;">
                        <h1 style="font-size: 50px; font-family: Arial Black, Gadget, sans-serif;">Old Patient<br>(Kiosk)</h1>
                        <div id="oldpat"  style="font-size: 100px; width: 500px; height: 500; font-family: Arial Black, Gadget, sans-serif;">
                            #
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="newpatpriodiv">
            <div class="card" align="center">
                <div class="card-body">
                    <button class="btn btn-primary" onclick="newpatprioadd()" style="border: 5px solid black;">
                        <h1 style="font-size: 50px; font-family: Arial Black, Gadget, sans-serif;">PRIORITY<br>New Patient<br>(Registration Area)</h1>
                        <div id="newpatprio"  style="font-size: 100px; width: 500px; height: 500; font-family: Arial Black, Gadget, sans-serif;">
                            #
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="oldpatpriodiv">
            <div class="card" align="center">
                <div class="card-body">
                    <button class="btn btn-danger" onclick="oldpatprioadd()" style="border: 5px solid black;">
                        <h1 style="font-size: 50px; font-family: Arial Black, Gadget, sans-serif;">PRIORITY<br>Old Patient<br>(Kiosk)</h1>
                        <div id="oldpatprio"  style="font-size: 100px; width: 500px; height: 500; font-family: Arial Black, Gadget, sans-serif;">
                            #
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="col md-12">
            <div align="center">
                <div style="font-size: 50px; font-family: Arial Black, Gadget, sans-serif;">
                    {{date('F d Y', strtotime($date[0]->dater))}}
                </div>
                <div id="timer" style="font-size: 50px; font-family: Arial Black, Gadget, sans-serif;"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function startTime()
        {

            $.ajax({
                type: 'GET',
                url: '/onload',
                success: function(data){
                console.log(data);
                document.getElementById("newpat").innerHTML = data['newpat'];
                document.getElementById("oldpat").innerHTML = data['oldpat'];
                document.getElementById("newpatprio").innerHTML = data['newpatprio'];
                document.getElementById("oldpatprio").innerHTML = data['oldpatprio'];
                }
            });

            startTime2();
        }

        function newpatadd()
        {
            $.ajax({
                type: 'GET',
                url: '/newpatientadd',
                success: function(data){
                console.log(data);
                document.getElementById("newpat").innerHTML = data;
                $("#oldpatdiv").hide();
                $("#newpatpriodiv").hide();
                $("#oldpatpriodiv").hide();
                window.print();
                $("#oldpatdiv").show();
                $("#newpatpriodiv").show();
                $("#oldpatpriodiv").show();
                }
            });
        }

        function newpatprioadd()
        {
            $.ajax({
                type: 'GET',
                url: '/newpatientprioadd',
                success: function(data){
                console.log(data);
                document.getElementById("newpatprio").innerHTML = data;
                $("#oldpatdiv").hide();
                $("#newpatdiv").hide();
                $("#oldpatpriodiv").hide();
                window.print();
                $("#oldpatdiv").show();
                $("#newpatdiv").show();
                $("#oldpatpriodiv").show();
                }
            });
        }

        function oldpatadd()
        {
            $.ajax({
                type: 'GET',
                url: '/oldpatientadd',
                success: function(data){
                console.log(data);
                document.getElementById("oldpat").innerHTML = data;
                $("#newpatdiv").hide();
                $("#newpatpriodiv").hide();
                $("#oldpatpriodiv").hide();
                window.print();
                $("#newpatdiv").show();
                $("#newpatpriodiv").show();
                $("#oldpatpriodiv").show();
                }
            });
        }

        function oldpatprioadd()
        {
            $.ajax({
                type: 'GET',
                url: '/oldpatientprioadd',
                success: function(data){
                console.log(data);
                document.getElementById("oldpat").innerHTML = data;
                $("#oldpatdiv").hide();
                $("#newpatdiv").hide();
                $("#newpatpriodiv").hide();
                window.print();
                $("#oldpatdiv").show();
                $("#newpatdiv").show();
                $("#newpatpriodiv").show();
                }
            });
        }
        

        function startTime2()
        {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('timer').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(startTime2, 1000); 
            console.log('1')
        }
        function checkTime(i)
        {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
@endsection