@include('layout.header') <!-- Include the header layout -->

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container">
        <!-- Form Start User Information -->
        <form id="userForm" class="my-5" enctype="multipart/form-data">
            <!-- Include the form for adding a new user -->
            @include('components.User.AddNewUser')
        </form>
        <!-- Div to display error messages -->
        <div id="errorMessages"></div> <!-- This div will display any error messages -->
        <!-- Form End User Information -->

        <!-- Show Start User Information -->
        <!-- Include the user information table to display existing users -->
        @include('components.User.UserInfoTable')
        <!-- Show End User Information -->
    </div>
</body>

@include('layout.footer') <!-- Include the footer layout -->

<script>
    // Handle form submission for user creation
    $('#userForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        // Clear previous error messages
        $('.text-danger').html('');
         
        let isValid = true; // Flag to track the validity of the form

        // Name validation
        const name = $('#name').val();
        if (!name || !/^[a-zA-Z ]+$/.test(name) || name.length > 255) {
            $('#name_error').html('Name is required and must be alphabetic with max length 255.'); // Show error for name validation
            isValid = false; // Set validity to false
        }

        // Email validation
        const email = $('#email').val();
        if (!email || !/\S+@\S+\.\S+/.test(email)) {
            $('#email_error').html('A valid email is required.'); // Show error for email validation
            isValid = false; // Set validity to false
        }

        // Phone validation
        const phone = $('#phone').val();
        if (!phone || !/^\d+$/.test(phone)) { // Check if phone contains only digits
            $('#phone_error').html('Phone must be a valid 10-digit number starting with 6-9.'); // Show error for phone validation
            isValid = false; // Set validity to false
        }

        // Description validation
        const description = $('#description').val();
        if (!description) {
            $('#description_error').html('Description is required.'); // Show error for description validation
            isValid = false; // Set validity to false
        }

        // Role ID validation
        const roleId = $('#role_id').val();
        if (!roleId || isNaN(roleId)) {
            $('#role_id_error').html('Role ID is required and must be selected.'); // Show error for role ID validation
            isValid = false; // Set validity to false
        }

        // Profile image validation
        const profileImage = $('#profile_image')[0].files[0];
        if (!profileImage || !['image/jpeg', 'image/png'].includes(profileImage.type) || profileImage.size > 2048 * 1024) {
            $('#profile_image_error').html('Profile image is required and must be a JPEG or PNG under 2MB.'); // Show error for profile image validation
            isValid = false; // Set validity to false
        }

        // If all validations pass, submit the form
        if (isValid) {
            // Create a FormData object from the form to handle file uploads
            let formData = new FormData(this);

            // Send an AJAX request to store the new user
            $.ajax({
                url: 'users', // The URL to send the request to
                type: 'POST', // The HTTP method to use
                data: formData, // The data to send
                contentType: false, // Prevent jQuery from setting content type
                processData: false, // Prevent jQuery from processing the data
                success: function(response, textStatus, jqXHR) {
                    // Update the UserInfoTable with the response from the server
                    $(`#UserInfoTable`).html(response); // Refresh the user info table with new data
                    swal("Added!", "User Added successfully!", "success"); // Show success alert

                    // Clear form fields after successful submission
                    $('.form-control').val(''); // Reset text input fields
                    $('.form-select').val(''); // Reset select fields
                },
                error: function(xhr) {
                    // Handle validation errors from the server
                    let errors = xhr.responseJSON.errors; // Get errors from the response
                    for (key in errors) {
                        // Display each error message corresponding to the input field
                        $(`#${key}_error`).html(`${errors[key]}`); // Show server-side validation errors
                    }
                }
            });
        }
    });
</script>
