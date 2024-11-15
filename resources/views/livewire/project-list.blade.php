<div>

       <style>
        @media screen and (min-width: 1024px) {
            #content {
                float: none;
                width: 90%;
                margin-left: auto;
                margin-right:auto;
            }
        }
        #wpadminbar {
            display: none;
        }
        table.persontable td.overcommitted {
            background-color: red;
            color: white;
        }
        table.persontable td.awaycommitted {
            background-color: yellow;
            color: black;
        }
        .cell {
          width: 100px;
          border-style: solid;
          border-color: grey;

          font-size:15.2px;

    border-top-width: 0;
    border-left-width: 0;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    height: 22px;
    empty-cells: show;
          line-height: 21px;
    padding: 0 4px;
    background-color: #fff;
    vertical-align: top;
    overflow: hidden;
    outline-width: 0;
    white-space: pre-line;
    background-clip: padding-box;

          }
        .projectrow{
          max-height: 15px;
        }
        .ctr {
          text-align: center;
        }
        .projectnametable {
          max-width:200px;
          border-collapse: collapse;
          flex-shrink: 1;
        }
    </style>


    @foreach ($projects as $project)
    <h1 style="font-family: Jackwrite, sans-serif; font-size:24pt">{{ $project->name }}</h1>
    @endforeach
</div>
