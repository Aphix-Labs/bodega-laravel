<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PCFactory</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.9/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.9/css/dataTables.bootstrap.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.9/js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.9/js/jquery.dataTables.min.js"></script>

    </head>
    <style>
        @media only screen and (max-width: 800px) {

            /* Force table to not be like tables anymore */
            #no-more-tables table,
            #no-more-tables thead,
            #no-more-tables tbody,
            #no-more-tables th,
            #no-more-tables td,
            #no-more-tables tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #no-more-tables tr { border: 1px solid #ccc; }

            #no-more-tables td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
                white-space: normal;
                text-align:left;
            }

            #no-more-tables td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align:left;
                font-weight: bold;
            }

            /*
            Label the data
            */
                #no-more-tables td:before { content: attr(data-title); }
            }
    </style>

    <body>

        <div class="container">
            <div id="no-more-tables">
                <table id='table' class="col-md-12 table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Actualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td data-title="Codigo"> {{ $product->code}} </td>
                            <td data-title="Nombre"> {{ $product->name}} </td>
                            <td data-title="Marca"> {{ $product->brand}} </td>
                            <td data-title="Cantidad"> {{ $product->quantity}} </td>
                            <td data-title="Precio"> {{ $product->price}} </td>
                            <td data-title="Actualizado"> {{ $product->updated_at->diffForHumans()}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </body>
    <script>
        $(document).ready(function(){
            $('#table').DataTable({
                dom: 'ft',
                bPaginate: false,
                ordering: false
            });
        });
    </script>
</html>
