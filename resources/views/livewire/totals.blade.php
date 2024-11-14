<div>
    <h2>Weekly Total Hours By Person</h2>
    <table class='persontable'>
        <tr>
            <td class='bold ctr'>Person</td>
            @foreach ($mondays as $m)
                <td class='ctr bold'>{{$m}}</td>
            @endforeach
        </tr>


        @foreach ($people as $name=>$hours)

        <tr>
            <td class='ctr bold'>{{$name}}</td>
            @foreach ($hours as $h)
            <td class='ctr {{ ($h > 32) ? " overcommitted " : "" }}'>{{$h}}</td>
            @endforeach
        </tr>

        @endforeach

    </table>

     <style>
        table.persontable td {
            min-width:100px;
            border: 1px solid black;
            margin:0;
            padding:0;
        }
        .ctr {
            text-align:center;
        }
        .bold {
            font-weight:bold;
        }
        .persontable {
            border-collapse: collapse;
        }
        .overcommitted {
            background-color: red;
            color: white;
        }

    @media screen and (min-width: 1024px) {
        #content { float: none; width: 90%; margin-left: auto; margin-right:auto; }
    }
    .overcommitted {
        color: white;
        background-color: red;
    }
    </style>

</div>