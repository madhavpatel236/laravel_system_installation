<div>
    <form name="initial_form" id="initial_form" method="post" action="{{ route('Home.store') }}">
        @csrf
        @method('POST')
        <lable> Key: </lable>
        <input id="key" name="key" value={{ $requestData['key'] }} />
        <span id="key_error" name="key_error" class="key_error"  >
            {{ $key_error }}
        </span>
        <br /> <br />

        <lable> Database Name: </lable>
        <input id="dbName" name="dbName" value={{ $requestData['dbName'] }} /> <br /> <br />

        <button> Next </button>
    </form>
</div>
