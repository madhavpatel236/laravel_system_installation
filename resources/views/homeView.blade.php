<div>
    <form name="initial_form" id="initial_form" method="post" action="{{ route('Home.store') }}">
        @csrf
        @method('POST')
        <lable> Key: </lable>
        <input id="key" name="key" value="" /> <br /> <br />

        <lable> Database Name: </lable>
        <input id="dbName" name="dbName" /> <br /> <br />

        <button> Next </button>
    </form>
</div>
