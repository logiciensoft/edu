## Project Setup
    1. Clone the project on your pc
    2. Run composer install
    3. Create the .env file from .env.example in the project
    4. Update the database credential in the .env file
    5. Run php artisan key:generate
    6. Run php artisan migrate
    7. Run php artisan passport:install
    8. Run php artisan db:seed
    9. Run php artisan serve
    10. Navigate to http://localhost:8000/register
    11. Register with your details to get your oauth credentials

   
## API DOCUMENTATION
### * Get the Access Token
<b>End Point</b>: /oauth/token <br />
<b>Method</b>: POST <br />
<b>Request Parameters</b>:
<table>
<tr>
    <th>Name</th>
    <th>Description</th>
</tr>
<tr>
    <td>grant_type</td>
    <td>The type of access token, value should be set to "password"</td>
</tr>
<tr>
    <td>client_id</td>
    <td>The user's client ID</td>
</tr>
<tr>
    <td>client_secret</td>
    <td>The user's client secret</td>
</tr>
<tr>
    <td>username</td>
    <td>The user's email address</td>
</tr>
<tr>
    <td>password</td>
    <td>The user's password</td>
</tr>
</table>
<b>Response</b>:
    <table>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>token_type</td>
        <td>The type of token</td>
    </tr>
    <tr>
        <td>expires_in</td>
        <td>The expiration date of the access token</td>
    </tr>
    <tr>
        <td>access_token</td>
        <td>The access token used to send API requests</td>
    </tr>
    <tr>
        <td>refresh_token</td>
        <td>The token used to refresh the access token</td>
    </tr>
    </table>
    <b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/oauth/token",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
        },
         type: 'POST',
         data: {
            "grant_type": "password",
            "client_id": 2,
            "client_secret": "7jW625okWkUMv35Xu5tszIxVDrNzjJHnCEPoM2OI",
            "username": "test@gmail.com",
            "password": "password123"
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

### * Courses
##### ** _Get All Courses_
<b>End Point</b>: /api/courses <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/courses",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'GET',
        success: function(data) {
            console.log(data);
            $('#content').html(JSON.stringify(data));
        }
    });
</pre>
<br />

##### ** _Get a specific course_
<b>End Point</b>: /api/courses/{id} <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/courses/1",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'GET',
        success: function(data) {
            console.log(data);
            $('#content').html(JSON.stringify(data));
        }
    });
    </pre>
<br />

##### ** _Create a new course_
<b>End Point</b>: /api/courses <br />
<b>Method</b>: POST <br />
<b>Request Parameters</b>:
<table>
<tr>
    <th>Name</th>
    <th>Description</th>
</tr>
<tr>
    <td>name</td>
    <td>The name of the course</td>
</tr>
<tr>
    <td>subject_ids</td>
    <td>The list of subject ID that belongs to the course (Optional)</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/courses",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'POST',
         data: {
            "name": "History",
            "subject_ids": [1,2,3]
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Update an existing course_
<b>End Point</b>: /api/courses/{id} <br />
<b>Method</b>: PUT <br />
<b>Request Parameters</b>:
<table>
<tr>
    <th>Name</th>
    <th>Description</th>
</tr>
<tr>
    <td>name</td>
    <td>The name of the course</td>
</tr>
<tr>
    <td>subject_ids</td>
    <td>The list of subject ID that belongs to the course (Optional)</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/courses/3",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'PUT',
         data: {
            "name": "New History",
            "subject_ids": [1,4]
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Delete an existing course_
<b>End Point</b>: /api/courses/{id} <br />
<b>Method</b>: DELETE <br />
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/courses/3",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'DELETE',
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />
