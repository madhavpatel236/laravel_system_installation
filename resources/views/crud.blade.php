<div>
    <form method="POST" action="{{ route('Crud.store') }}" id="crud_form">
        @csrf
        <label> Name: </label>
        <input name="Name" class="Name" id="Name" type="text" />
        <span id="name_error"> </span>

        <br /> <br />

        <label> Age: </label>
        <input name="Age" class="Age" id="Age" />
        <span id="age_error"> </span>
        <br /> <br />

        <button id="submit_btn"> Submit </button>
    </form>
</div>

@if (count($users) != 0)
    <table border="2" id="user_table">
        <thead id="table_thead">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
@endif

@if (count($users) == 0)
    <h2 style="text-align: center; "> No user present. </h2>
@endif

<tbody>
    @forelse ($users as $each)
        <tr>
            <td class="userName"> {{ $each['Name'] }} </td>
            <td> {{ $each['Age'] }} </td>
            <td>
                <a class="edit-btn" id="edit-btn" href="{{ route('Crud.edit', $each->id) }}"> Edit </a>
                <form method="POST", action="{{ route('Crud.destroy', $each->id) }}">
                    @csrf
                    @method('DELETE')
                    <button> Delete </button>
                </form>
            </td>
        </tr>
    @empty
    @endforelse
</tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
          
        $('#Name').on('input', validateName)
        $('#Age').on('input', validateAge)
        $('#crud_form').submit(function(e) {
            var isValidateName = validateName();
            var isValidateAge = validateAge();
            if ((!isValidateName) || (!isValidateAge)) {
                e.preventDefault();
            }
        })
    })

    function validateName() {
        var Name = $('#Name').val().trim();
        if (Name == "") {
            $('#name_error').html('Name should not be empty');
            return false;
        } else if (Name.length >= 25) {
            $('#name_error').html('Name length should not be more then 25');
            return false;
        } else {
            $('#name_error').html('');
            // $('#Name').html('');
            return true;
        }
    }

    function validateAge() {
        var Age = $('#Age').val().trim();
        var pattern = new RegExp("[0-9]");
        var hasOnlyNumbers = new RegExp("^[0-9]{1,64}$");

        if (Age == null || Age == "") {
            $('#age_error').html('Age should not be empty.');
            return false;
        } else if (!hasOnlyNumbers.test(Age)) {
            $('#age_error').html('Age only contains a numbers.');
            return false;
        } else if (Age > 120) {
            $('#age_error').html('Please enter a valid age.');
            return false;
        } else {
            $('#age_error').html('');
            return true;
        }
    }
</script>


<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(120deg, #d16ba5, #86a8e7, #5ffbf1);
        background-size: 200% 200%;
        animation: gradientShift 10s ease infinite;
        padding: 50px 20px;
        margin: 0;
        color: #333;
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Form */
    form#crud_form {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        max-width: 500px;
        margin: 0 auto 50px;
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    label {
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 8px;
        display: block;
    }

    input[type="text"],
    input {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus,
    input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        outline: none;
    }

    /* Error messages */
    #name_error,
    #age_error {
        color: #e74c3c;
        font-size: 13px;
        margin-top: -10px;
        margin-bottom: 12px;
        display: block;
    }

    /* Submit button */
    button#submit_btn {
        background-color: #007bff;
        color: white;
        padding: 12px 25px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        width: 100%;
    }

    button#submit_btn:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    button#submit_btn:active {
        background-color: #004494;
        transform: translateY(0);
    }

    /* Table */
    table {
        width: 90%;
        max-width: 900px;
        margin: 0 auto;
        border-collapse: collapse;
        /* border-spacing: 0 0px; */
        background-color: white;
        /* border-radius: 14px; */
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        font-size: 15px;
    }



    thead {
        background-color: #007bff;
        color: white;
    }

    thead th {
        padding: 15px 20px;
        font-weight: bold;
        text-align: left;
    }

    tbody tr {
        background-color: #fdfdfd;
        transition: background 0.3s ease;
    }

    tbody tr:hover {
        background-color: #eef4ff;
    }

    tbody td {
        padding: 14px 20px;
        border-bottom: 1px solid #e0e0e0;
        vertical-align: middle;
    }

    td.userName {
        max-width: 200px;
        /* Adjust as needed */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Edit link */
    /* tbody td a {
        color: #007bff;
        font-weight: 600;
        text-decoration: none;
        margin-right: 12px;
        transition: color 0.3s ease;
    } */

    /* tbody td a:hover {
        color: #004494;
    } */

    /* Edit button styling */
    .edit-btn {
        background-color: #28a745;
        color: white !important;
        padding: 6px 12px;
        font-size: 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .edit-btn:hover {
        background-color: #218838;
    }


    /* Delete button */
    tbody td form {
        display: inline;
    }

    tbody td form button {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    tbody td form button:hover {
        background-color: #c0392b;
    }

    /* Responsive */
    @media (max-width: 600px) {
        form#crud_form {
            padding: 20px;
        }

        table {
            width: 100%;
            font-size: 13px;
        }

        thead th,
        tbody td {
            padding: 10px 12px;
        }
    }
</style>
