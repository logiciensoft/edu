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
        }
    });
</pre>
<br />

##### ** _Get a specific course details_
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
            "name": "MIT",
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
            "name": "MIT-Course",
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

### * Subjects
##### ** _Get All Subjects_
<b>End Point</b>: /api/subjects <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/subjects",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'GET',
        success: function(data) {
            console.log(data);
        }
    });
</pre>
<br />

##### ** _Get a specific subject details_
<b>End Point</b>: /api/subjects/{id} <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/subjects/1",
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

##### ** _Create a new subject_
<b>End Point</b>: /api/subjects <br />
<b>Method</b>: POST <br />
<b>Request Parameters</b>:
<table>
<tr>
    <th>Name</th>
    <th>Description</th>
</tr>
<tr>
    <td>name</td>
    <td>The name of the subject</td>
</tr>
<tr>
    <td>tutorial_ids</td>
    <td>The list of tutorial ID that belongs to the subject (Optional)</td>
</tr>
<tr>
    <td>quiz_ids</td>
    <td>The list of quiz ID that belongs to the subject (Optional)</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/subjects",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'POST',
         data: {
            "name": "C++",
            "tutorial_ids": [1],
            "quiz_ids": [1,2]
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Update an existing subject_
<b>End Point</b>: /api/subjects/{id} <br />
<b>Method</b>: PUT <br />
<b>Request Parameters</b>:
<table>
<tr>
    <th>Name</th>
    <th>Description</th>
</tr>
<tr>
    <td>name</td>
    <td>The name of the subject</td>
</tr>
<tr>
    <td>tutorial_ids</td>
    <td>The list of tutorial ID that belongs to the subject (Optional)</td>
</tr>
<tr>
    <td>quiz_ids</td>
    <td>The list of quiz ID that belongs to the subject (Optional)</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/subjects/6",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'PUT',
         data: {
            "name": "Java",
            "tutorial_ids": [1],
            "quiz_ids": [1,3]
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Delete an existing subject_
<b>End Point</b>: /api/subjects/{id} <br />
<b>Method</b>: DELETE <br />
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/subjects/6",
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


### * Tutorials
##### ** _Get All Tutorials_
<b>End Point</b>: /api/tutorials <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/tutorials",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'GET',
        success: function(data) {
            console.log(data);
        }
    });
</pre>
<br />

##### ** _Get a specific tutorial details_
<b>End Point</b>: /api/tutorials/{id} <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/tutorials/1",
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

##### ** _Create a new tutorial_
<b>End Point</b>: /api/tutorials <br />
<b>Method</b>: POST <br />
<b>Request Parameters</b>:
<table>
<tr>
    <td>content</td>
    <td>The content of the tutorial</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/tutorials",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'POST',
         data: {
            "content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lorem est, blandit sed risus non, semper pretium urna. Mauris maximus, mi eget hendrerit ultricies, lectus ante fermentum tellus, non sagittis diam felis ultricies mauris. Cras consequat lacinia malesuada."
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Update an existing tutorial_
<b>End Point</b>: /api/tutorials/{id} <br />
<b>Method</b>: PUT <br />
<b>Request Parameters</b>:
<table>
<tr>
    <td>content</td>
    <td>The content of the tutorial</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/tutorials/3",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'PUT',
         data: {
            "content": "Nam dapibus in magna a euismod. Phasellus et tincidunt libero, eu gravida tellus. In gravida est velit, sed rhoncus est maximus faucibus. Praesent sed arcu imperdiet, malesuada tellus vel, efficitur nulla."
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Delete an existing tutorial_
<b>End Point</b>: /api/tutorials/{id} <br />
<b>Method</b>: DELETE <br />
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/tutorials/3",
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

### * Quizzes
##### ** _Get All Quizzes_
<b>End Point</b>: /api/quizzes <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/quizzes",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'GET',
        success: function(data) {
            console.log(data);
        }
    });
</pre>
<br />

##### ** _Get a specific quiz details_
<b>End Point</b>: /api/quizzes/{id} <br />
<b>Method</b>: GET <br />
<b>Example</b>:
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/quizzes/1",
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

##### ** _Create a new quiz_
<b>End Point</b>: /api/quizzes <br />
<b>Method</b>: POST <br />
<b>Request Parameters</b>:
<table>
<tr>
    <td>name</td>
    <td>The name/description of the quiz</td>
</tr>
<tr>
    <td>questions</td>
    <td>The list of questions assigned that contains the quiz</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/quizzes",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'POST',
         data: {
            "name": "1st Evaluation",
            "questions": [
                {
                    "question": "What is the fastest car in the world?",
                    "responses": ["Lamborgnini", "Kia", "Trotro"]
                },
                {
                    "question": "Who is the current president of Ghana?",
                    "responses": ["John Mahama", "Nana Akufo-Addo"]
                }
            ]
         },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Update an existing quiz_
<b>End Point</b>: /api/quizzes/{id} <br />
<b>Method</b>: PUT <br />
<b>Request Parameters</b>:
<table>
<tr>
    <td>name</td>
    <td>The name/description of the quiz</td>
</tr>
<tr>
    <td>questions</td>
    <td>The list of questions assigned that contains the quiz</td>
</tr>
</table>
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/quizzes/4",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer $_access_token");
        },
         type: 'PUT',
         data: {
            "name": "1st Evaluation (GK)",
            "questions": [
                {
                    "question": "What is the fastest car in the world?",
                    "responses": ["Lamborgnini", "Kia", "Trotro"]
                }
            ]
        },
        success: function(data) {
            console.log(data);
        }
    });
    </pre>
<br />

##### ** _Delete an existing quiz_
<b>End Point</b>: /api/quizzes/{id} <br />
<b>Method</b>: DELETE <br />
<b>Example</b>:<br />
    <pre>
    $.ajax({
        url: "http://localhost:8000/api/quizzes/3",
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

