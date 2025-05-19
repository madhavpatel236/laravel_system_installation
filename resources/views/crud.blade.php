<div>
    <form method="POST" action="{{ route('crud.store') }}">
        @csrf
        <lable> Name: </lable>
        <input name="Name" class="Name" id="Name" type="text" /> <br /> <br />

        <lable> Age: </lable>
        <input name="Age" class="Age" id="Age" type="numbers" /> <br /> <br />

        <button id="submit_btn"> Submit </button>
    </form>
</div>

{{-- {{ $users }} --}}
<table border="2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {{-- @php
        echo"<pre>";var_dump($users[0]); --}}
        {{-- @endphp --}}
        {{-- @forelse ($users as $eachUser) --}}
        @forelse ($users as $each)
            {{-- {{ $each }} --}}
            <tr>
                <td> {{ $each['Name'] }} </td>
                <td> {{ $each['Age'] }} </td>
                <td>
                    {{-- <form method="POST", action="{{ route('crud.edit', $each->id) }}">
                        @csrf
                        @method('PUT')
                        <button> Edit </button>
                    </form> --}}

                    <a href="{{ route('crud.edit', $each->id) }}"> Edit </a>
                    <form method="POST", action="{{ route('crud.destroy', $each->id) }}">
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
