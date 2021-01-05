# Example PHP Docker project

Do not use in production.

This is a simple project to make you development with PHP simpler.

## License - MIT License

Copyright 2020 Alexandre Quessy

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


## How to use

```
docker-compose up -d --build
```

Go to http://localhost:8883

If you deploy this on a server, make sure to change the port of the web service, if more than one project uses
this boilerplate. You must edit the docker-compose.yml to do so. See the documentation for Docker Compose.

You should change the environment variables in the docker-compose.yml
One thing that is really important, is that if you write some client-side JavaScript code, either to GET HTTP
requests using a relative path, or use the full domain name for the server where it's installed.
Hence, when you deploy it to a server, **you should change the value of CONFIG_BACKEND_HOST to match the IP address**
of your server.

Happily, you can simply edit the files under www, and the changes will be reflected in your application.

This docker-compose.yml file also provides some SQL management tools. Note that they are quite unsecure, since
the password for your MySQL user are exposed in cleartext in the docker-compose.yml, and anyone can then change
the contents of your database easily.

Do not use as is in production!

# User Story

# Activity tracker

## View a page about the project

As a user, I want to be able to view a page about the project.

Criteria:

* An "About" menu item points to it.
* The menu must look good on both mobile and desktop devices.
* It should shrink to a "burger-style" menu if the space on the screen is not sufficient.
* In the page, it displays the text below.

Text:

"This Web app is an activity tracker. It allows you to track time that you spend on some activities."

## View the year of the creation of the Web site

As a user, I want to be able to view the year of the creation of the Web site.

Criteria:

* Show the following text at the bottom of the page: "Created in 2020"

## Create an activity

As a user, I want to be able to add an activity.

Criteria:

* I can add any activity in the activity tracker by selecting Add an activity in the menu
* The name of the activity must be written in a text box and saved by clicking on the Save button.
* The user can also edit the description of the activity, using a text area.
* pick a date for the activity. (using any date widget)
* pick a duration. (in hours and minutes) with two text fields.
* I can add as many activities as I want in the tracker

## Display all activities

As a user, I want to be able to view the list of all activities added in the tracker

Criteria:

* I can see the list of all activities I added in the tracker by selecting Activities in the menu.
* The activities are sorted by date, and then alphabetically.

## Edit an activity

As a user, I want to be able to edit the name of an activity.

Criteria:

* I can modify the name of an activity by going to the activity detail page and edit the text in the text box
* I can save my changes by clicking on the Save button 

## Delete an activity

As a user, I want to be able to delete an activity from the tracker.

Criteria:

* I can remove a specific activity from my tracker by going to the activity detail page and clicking on the Delete button.
* To confirm the deletion of the activity and the removal of this activity, I must click on confirm on the pop up that appears after clicking on Delete.

## Create a category 

As a user, I want to be able to create categories to organize activities.

Criteria:

* By selecting Add a category in the menu, I can enter the name of a new category in a text box and save it with the Save button.

## Edit a category

As a user, I want to be able to edit the name of an existing category.

Criteria:

* By clicking on the Edit button, I can modify the name of the category in the category detail page.

## Delete a category 

As a user, I want to be able to delete a category from the activity tracker 

Criteria:

* By clicking on the delete button on the category detail page I can remove the selected category from the activity tracker.
* When I click on the Delete button, I must confirm the deletion by clicking on confirm on a pop up.

## Choose the category of an activity

As a user, I want to be able to choose the category of any activity entered in my tracker.

Criteria:

* In the activity edition form, use a drop-down menu with all the categories for this activity.
* In the list of all activities, show its category next to its title.

## Read the list of activities in a category

As a user, I want to be able to see the list of all activities added in a selected category.

Criteria:

* By clicking on a specific category, it opens a page where I can see a list of all the activities in this category.

## Login

As a user, I want to be able to login to this Web site.

Criteria:

* Show a "Sign In" menu item if the user is not logged in.
* Take them to a a login page.
* Provide a username text field and a password field.
* A "Submit" button allows to submit the form.
* If the user is found, allow them to log in.
* Create the list of users listed below. Each user should have the same password as their name.

List of users:

* alice
* bob
* charlie
* david

## Create an account

As a user, I want to be able to create my account to save and share my to do lists 

Criteria: 

* Show a "Sign Up" menu item if the user is not logged in.
* Take them to a a signup page.
* Provide a username text field and two password fields.
* The password must match.
* A "Submit" button allows to submit the form.
* Make sure the username is not already taken.
* Create the user if not.
