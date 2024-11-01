@csrf <!-- CSRF token for form security, prevents cross-site request forgery -->
<div class="row">
    <!-- User Full Name Input -->
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
        <!-- Error message for name input -->
        <span class="text-danger" id='name_error'></span>
    </div>

    <!-- User Email Input -->
    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email (Unique)</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <!-- Error message for email input -->
        <span class="text-danger" id='email_error'></span>
    </div>

    <!-- User Phone Number Input -->
    <div class="col-md-6 mb-3">
        <label for="phone" class="form-label">Phone Number (Only 10 digits Allowed)</label>
        <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
        <!-- Error message for phone input -->
        <span class="text-danger" id='phone_error'></span>
    </div>

    <!-- Profile Image Upload Input -->
    <div class="col-md-6 mb-3">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" class="form-control" id="profile_image" name="profile_image">
        <!-- Error message for profile image input -->
        <span class="text-danger" id='profile_image_error'></span>
    </div>

    <!-- User Role Selection Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="role_id" class="form-label">Select User Role</label>
        <select class="form-select" id="role_id" aria-label="Select User Role" name="role_id">
            @include('components.RoleSelect') <!-- Include the role selection component -->
        </select>
        <!-- Error message for role selection -->
        <span class="text-danger" id='role_id_error'></span>
    </div>

    <!-- User Description Textarea -->
    <div class="col-md-6 mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        <!-- Error message for description input -->
        <span class="text-danger" id='description_error'></span>
    </div>

    <!-- Submit Button -->
    <div class="col-12">
        <button class="btn btn-success" type="submit">Submit</button> <!-- Button to submit the form -->
    </div>
</div>