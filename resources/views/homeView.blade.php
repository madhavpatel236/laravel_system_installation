<div>
    <form name="initial_form" id="initial_form" method="post" action="{{ route('Home.store') }}">
        @csrf
        @method('POST')
        <lable> Key: </lable>
        <input id="key" name="key" />
        <span id="key_error" name="key_error" class="key_error">
            {{ $key_error }}
        </span>
        <br /> <br />

        <lable> Database Name: </lable>
        <input id="dbName" name="dbName" />
        <span id="dbname_error" name="dbname_error" class="dbname_error"></span> <br /> <br />
        <button id="submit_btn"> Next </button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#dbName").on("input", validateDbName);
        $("#initial_form").submit(function(e) {
            var isValid = validateDbName();
            if (!isValid) {
                e.preventDefault();
            }
        })
    })

    function validateDbName() {
        var dbname = $('#dbName').val();
        var pattern = new RegExp("[a-zA-Z_][a-zA-Z0-9_\$]{0,63}$");
        if (!(pattern.test(dbname))) {
            // e.preventDefault();
            $('#dbname_error').html('Please enter a valid database name');
            return false
        } else {
            $('#dbname_error').html('');
            return true;
        }
    }
</script>
