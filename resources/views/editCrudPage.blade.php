<h3> Edit </h3>
<form id="edit_form" action="{{ route('Crud.update', $users->id) }}" method="post">
    @csrf
    @method('PUT')
    Name: <input type="text" id="Name" name="Name" value="{{ $users->Name }}" />
    <span id="name_error"> </span>
    {{-- @error('Name')
    <span id="name_error"> {{ $message }} </span>
    @enderror --}}

    <br /> <br />
    Age: <input name="Age" id="Age" value="{{ $users->Age }}" />
    <span id="age_error"> </span>
    <button> Update </button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- <script>
    $(document).ready(function() {
        $('#Name').on('input', validateName)
        $('#Age').on('input', validateAge)

        $('#edit_form').submit(function(e) {
            var isValidateName = validateName();
            var isValidateAge = validateAge();
            if ((!isValidateName) || (!isValidateAge)) {
                e.preventDefault();
                $('Name').html($('name').val());
                $('Age').html($('Age').val());
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
            return true;
        }
    }

    function validateAge() {
        var Age = $('#Age').val().trim();
        var pattern = new RegExp("[0-9]");
        var hasOnlyNumbers = new RegExp("^[0-9]{1,64}$");

        // alert(Age.length);
        if (Age == null || Age == "") {
            $('#age_error').html('Age should not be empty.');
            return false;
        } else if (!hasOnlyNumbers.test(Age)) {
            $('#age_error').html('Age only contains a numbers.');
            return false;
        } else if (Age > 120) {
            $('#age_error').html('Please enter a valid age.');
            return false;
        } else if (Age == 0) {
            $('#age_error').html('Please enter a valid age.');
            return false;
        } else {
            $('#age_error').html('');
            return true;
        }
    }
</script> --}}





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

    /* Edit Heading */
    h3 {
        text-align: center;
        color: #333;
        font-size: 26px;
        margin-bottom: 20px;
    }

    span {
        color: red
    }

    /* Edit Form */
    form {
        background-color: #ffffff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        max-width: 500px;
        margin: auto;
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
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        outline: none;
    }

    /* Update Button */
    button {
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

    button:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    button:active {
        background-color: #004494;
        transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 600px) {
        form {
            padding: 20px;
        }

        h3 {
            font-size: 22px;
        }
    }
</style>
