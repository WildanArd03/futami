<html>

<head>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var html =
                '<tr><td><input type="text" name="txtFullname[]"></td><td><input type="text" name="txtEmail[]"></td><td><input type="text" name="txtPhone[]"></td><td><input type="text" name="txtAddress[]"></td><td><input type="button" name="remove" id="remove" value= "remove"> <input type="button" name="add1" id="add1" value="Add"></td></tr>';
            var max = 8;
            var x = 1;
            
            $("#add").click(function() {
                if (x <= max) {
                    $("#table_field").append(html);
                    x++;
                }
            });
            

            $("#table_field").on('click', '#remove', function() {
                $(this).closest('tr').remove();
                x--;
            });

        });

    </script>
</head>

<body>

    <form action="/tambahmulti/simpan" method="POST">
        @csrf
        <input type="text" name="lampiran">
        <table id="table_field" >
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone No</th>
                <th>Address</th>
                
                <th>Add/remove</th>
            </tr>
            <tr>
                <td><input type="text" name="txtFullname[]"></td>
                <td><input type="text" name="txtEmail[]"></td>
                <td><input type="text" name="txtPhone[]"></td>
                <td><input type="text" name="txtAddress[]"></td>
                
                <td><input type="button" name="add" id="add" value="Add"></td>
            </tr>

        </table>
        <input type="submit" value="Save Data" name="save" id="save">
    </form>
</body>

</html>
