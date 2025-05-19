<h3> Edit </h3>
<form action="{{ route('crud.update', $users->id) }}" method="post">
    @csrf
    @method('PUT')
    Name: <input type="text" name="Name" value="{{ $users->Name }}" /> <br /> <br />
    Age: <input type="number" name="Age" value="{{ $users->Age }}" /> <br /> <br />
    <button> Update </button>
</form>
