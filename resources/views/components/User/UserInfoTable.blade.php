<table class="table table-hover my-5" id="UserInfoTable"> <!-- Create a responsive table with hover effects and custom margin -->
    <thead>
        <tr> <!-- Table header row -->
            <th>Name</th> <!-- Column for user name -->
            <th>Email</th> <!-- Column for user email -->
            <th>Phone</th> <!-- Column for user phone number -->
            <th>Description</th> <!-- Column for user description -->
            <th>Profile Image</th> <!-- Column for user profile image -->
            <th>Role</th> <!-- Column for user role -->
        </tr>
    </thead>
    <tbody>
        @if(isset($user) && count($user) != 0) <!-- Check if the $user variable is set and not empty -->
            @foreach($user as $val) <!-- Loop through each user in the $user array -->
                <tr> <!-- Table row for each user -->
                    <td>{{$val->name}}</td> <!-- Display user name -->
                    <td>{{$val->email}}</td> <!-- Display user email -->
                    <td>{{$val->phone}}</td> <!-- Display user phone number -->
                    <td>{{$val->description}}</td> <!-- Display user description -->
                    <td>
                        <img src="{{url('/storage').'/'.$val->profile_image}}" alt="Profile Image" width="50"> <!-- Display user profile image with a set width -->
                    </td>
                    <td>{{$val->role->name}}</td> <!-- Display user role name -->
                </tr>
            @endforeach
        @else
            <tr> <!-- Row to display when no user data is found -->
                <td colspan="6">No Data Found</td> <!-- Span across all columns to indicate no data -->
            </tr>
        @endif
    </tbody>
</table>
