<div>
    <form name="initial_form" id="initial_form" method="post" action="{{ route('Home.store') }}">
        @csrf
        @method('POST')
        <label> Key: </label>
        <input id="key" name="key" value="{{ $requestData['key'] }}" />
        <span id="key_error" name="key_error" class="key_error">
            {{ $key_error }}
        </span>
        <br /> <br />

        <label> Database Name: </label>
        <input id="dbName" name="dbName" value="{{ $requestData['dbName'] }}" />
        <span id="dbname_error" name="dbname_error" class="dbname_error"></span> <br /> <br />
        <button id="submit_btn"> Next </button>
    </form>
</div>

{{-- <link href="{{ base_path('/config/style.css') }}" rel="stylesheet"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $("#dbName").on("input", validateDbName);

        $('#key').focusout(function() {
            validateKeyLength();
        });

        $("#initial_form").submit(function(e) {
            var isValid = validateKeyLength() && validateDbName();
            if (!isValid) {
                e.preventDefault();
            }
        })
    })

    function validateDbName() {
        var dbname = $('#dbName').val();
        // const pattern = /^[a-zA-Z][a-zA-Z0-9_]{0,63}$/;
        var pattern = new RegExp("^[a-zA-Z0-9_]{1,64}$");
        var hasOnlyNumbers = new RegExp("^[0-9]{1,64}$");

        if (dbname == "") {
            $('#dbname_error').html('database name should not be empty');
            return false
        } else if (hasOnlyNumbers.test(dbname)) {
            $('#dbname_error').html('Please enter a valid database name');
            return false
        } else if (!(pattern.test(dbname))) {
            // e.preventDefault();
            $('#dbname_error').html('Please enter a valid database name');
            return false
        } else {
            $('#dbname_error').html('');
            return true;
        }
    }

    function validateKeyLength() {
        var key = $('#key').val();

        if (key.length == 0) {
            $('#key_error').html('Key should not be empty.');
            return false
        } else if (key.length < 14) {
            // e.preventDefault();
            $('#key_error').html('Key length should be 14.');
            return false
        } else if (key.length > 14) {
            $('#key_error').html('Key length should be 14.');
            return false
        } else {
            $('#key_error').html('');
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

    form#initial_form {
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
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    input {
        width: 100%;
        padding: 14px 16px;
        margin-bottom: 10px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        font-size: 16px;
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(8px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    input:focus {
        border-color: #007bff;
        background: rgba(255, 255, 255, 0.6);
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        outline: none;
    }

    .key_error,
    .dbname_error {
        color: #e74c3c;
        font-size: 13px;
        margin-top: 3px;
        margin-bottom: 15px;
        display: block;
    }

    button#submit_btn {
        background-color: #007bff;
        color: #fff;
        padding: 12px 25px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        display: block;
        width: 100%;
        margin-top: 10px;
    }

    button#submit_btn:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    button#submit_btn:active {
        background-color: #004494;
        transform: translateY(0);
    }

    @media (max-width: 600px) {
        form#initial_form {
            padding: 25px 20px;
        }

        button#submit_btn {
            font-size: 15px;
        }
    }
</style>
