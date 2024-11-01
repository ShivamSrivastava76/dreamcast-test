@if(isset($role) && count($role) != 0) <!-- Check if the $role variable is set and contains elements -->
    <option>Select User Role</option> <!-- Placeholder option prompting the user to select a role -->
    @foreach($role as $val) <!-- Loop through the $role array -->
        <option value="{{$val->id}}">{{$val->name}}</option> <!-- Create an option for each role with its ID as the value and name as the displayed text -->
    @endforeach
@else
    <option value="0">No Role</option> <!-- Default option if no roles are available, indicating that there are no roles to select -->
@endif