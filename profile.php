<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="profile-picture">
            <img src="profile.jpg" alt="Amelly">
            <p class="email">amelly12@bbb.com</p>
        </div>
        <div class="profile-settings">
            <h2>Profile Settings</h2>
            <form>
                <div class="form-group">
                    <label for="first-name">Name</label>
                    <input type="text" id="first-name" placeholder="first name">
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" placeholder="surname">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" placeholder="enter phone number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" placeholder="enter address">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="enter email id">
                </div>
                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" id="education" placeholder="education">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" placeholder="country">
                </div>
                <div class="form-group">
                    <label for="state">State/Region</label>
                    <input type="text" id="state" placeholder="state">
                </div>
                <button type="submit">Save Profile</button>
            </form>
        </div>
        <div class="edit-experience">
            <h2>Edit Experience</h2>
            <form>
                <div class="form-group">
                    <label for="experience">Experience in Designing</label>
                    <input type="text" id="experience" placeholder="experience">
                </div>
                <div class="form-group">
                    <label for="details">Additional Details</label>
                    <input type="text" id="details" placeholder="additional details">
                </div>
                <button type="submit">Experience</button>
            </form>
        </div>
    </div>
</body>

</html>