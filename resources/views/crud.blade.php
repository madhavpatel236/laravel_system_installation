<div>
    <form method="POST" id="crud_form" action="{{ route('Crud.store') }}">
        @csrf
        <lable> Name: </lable>
        <input name="Name" class="Name" id="Name" type="text" />
        @error('Name')
            <span id="name_error"> {{ $message }} </span>
        @enderror
        <br /> <br />

        <lable> Age: </lable>
        <input name="Age" class="Age" id="Age" type="numbers" />
        @error('Age')
            <span id="age_error"> {{ $message }} </span>
        @enderror

        <br /> <br />

        <button id="submit_btn"> Submit </button>
    </form>
</div>

<table border="2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $each)
            <tr>
                <td> {{ $each['Name'] }} </td>
                <td> {{ $each['Age'] }} </td>
                <td>
                    <a href="{{ route('Crud.edit', $each->id) }}"> Edit </a>
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

{{-- <script>
    $(document).ready(function() {
        $("#Name").on("input", validateName);
        $("#Age").on("input", validateAge);

        $("#crud_form").submit(function(e) {
            var isValid = validateName() && validateName();
            if (!isValid) {
                e.preventDefault();
            }
            $('#Age').html("");
            $('#Name').html("");
        })
    })

    function validateName() {
        var name = $('#Name').val().trim();
        var pattern = new RegExp("[a-zA-Z_][a-zA-Z0-9_\$]{0,63}$");
        // alert(!(pattern.test(name)));

        if (!(pattern.test(name))) {
            $('#name_error').html('only character and numbers are allow.');
            return false;
        } else {
            $('#name_error').html('');
            return true;
        }
    }

    function validateAge() {
        var age = $('#Age').val().trim();
        var pattern = new RegExp("[0-9]");

        if (!(pattern.test(age))) {
            $('#age_error').html('only numbers are allow.');
            return false;
        } else {
            $('#age_error').html('');
            return true;
        }

    }
</script> --}}
