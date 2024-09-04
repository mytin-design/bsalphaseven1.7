<div class="central">

  <!-- onclick an option on the side bar - specified page should appear on the central holder-->

  //9/8/2023

# HOW TO OPEN A SPECIFIC TAB ON ANOTHER HTML PAGE

- cREATE an id/or class on the button that opens that particular tab e.g "defaultPaymentspage"

- and create a script that when the button on the other page is pressed, the script automatically clicks the button that opens the tab you and hooraa! 

--Try it before you get over excited....-:)

Love you code - 

# Consider having the chat as a dialog pop up

     

# As of (2/9) Logout button functional
onlick event listener attribute in html 8th padder - functional

# Login function

# 26- DEC -2023
STUDENTSDASH  -- 
userprofile divs changed to forms - 
Objective - to enable updating the information in db by PHP

-Community
--news and chats - as tabs - complete

-Programs
--programs - set as tabs
complete and working as intended;

-Upload function added to chat - 
-submit function added to msg btn - 
-message container changed to form - to handle sending of messages


--Upload function added to user profile

-Consider changing the container to form - so as to handle submissions

-Create a submit button -to effect the same;


# CHANGES 26TH DEC 2023
The students dashboard, should not have much priviledges;

I think, the student dashboard is just an output display of what the teachers want the learners to see;

As a learner, my dashboard should enable me to:
1. View my personal information
I do not necessarily have the priviledge to change since, any changes should be reflected in the admin first - so it is the admin dashboard that should change this information

2. View assignments, notes. exams. past papers, etc

3. Upload assignments, chat with schoolmates and teachers, etc

## THESE 3 ARE THE MAIN FUNCTIONS OF A STUDENTS DASHBOARD

4. View, games, news, clubs, enroll, etc


## END OF VERSION XXXXX12262023-11:30PMXXXX



## START OF studentsdashone VERSION 12-26-2023
The changes in this version should ensure the fulfillment of at least the 3 main objectives;

Remove anything else that is unnecessary


1. Remove the edit functionality in personal info page

The personal info page's data is queried from the database and echoed onto the page using php;

--removed successfully

2. Make the notes, assign's, and exams sections as tabs
Tab 1 - Available notes, exams or assign's
Tab 2 - Upload functionality/ Aidditional function - where necessary

Tab 3 - Uploaded and complete assignments


# END ------- ASSIGNMENT TABS COMPLETED SUCCESSFULLY

# START EXAMS SECTION
Objective

TAB 1 - Show exam past papers, completed exams  coming exams, etc


Instead of having a tab for notes, exams and assignments, we could have them all under coursework - Under coursework, there will be a list of enrolled subjects; Each subject will have 4 tabs, notes, exams, assignments, discussion;

The reason for this change was because of uploading specific assignments for each subject or teacher; 

Changes to be reflected in the next version. - studentsdashtwo
## END OF STUDENTSDASHONE - 


## START STUDENTSDASHTWO
SUBJECT REGISTRATION
Take the username of the logged in user and register the subjects to that username's subjects table


When subject is registered, it should appear in list of enrolled subjects

Each subjects can be clicked, and when clicked should display the template allowing user to see announcements, notes, exams, and discussions


Its time to connect this database to the main CPS WEB APPLICATION !!!!!!!!!!

STATUS: APPLICATION uploaded while working as intended.


NB: UPLOAD TO bsalphatwo 

## 28-12-2023

## CHANGES IN BASE ALPHA TWO COMPLEX

## FORCE REFRESH - CTRL +F5
Changes in css and Javascript may not reflect immediately as the browser uses the cached styles and scripts - However, to view immediate changes, press Ctrl + F5 to force refresh and see the updated version.


# bsalphafour - 20th jan 2024




# Obj 1
# Create Btn  - 
Onclick - opens the create account page in a new tab

# Obj 2
create an exam database

--- To include
- Select options  - used to search

- Main question is - What happens when a certain search criteria is passed

# What happens
- Example (exIndex) - If 
----Criteria 
1. Grade 1
2. X
3. 2024
4. II
5. Midterm

--- Then, we must have this data, in order to display it

-- Option one
- Have a table with titles of each of the criteria
-so that if a search parameter meets the title in a table, the title is highlighted, and if clicked, gives the user more options

--Option two - Best Version
Display the results of the class requested 

--The How 
-Create the display container - virtual
-- Have all the files in the root directory or a folder in the root directory

--Use ids to target files
-That is, if (exIndex), Show fileX, else if (another grade, year, etc), Show fileY, else, and so on



and how do I search


# Modify site for Consolata Primary School 

# Bein data  - 10th July 2024

# Stage 1
Rename current index file to directories.php  

# Create an index file


# bug xx

The carousel was being affected by a .fade class connected to an animation.
Problem was - The fade was too fast and only connected to one of the carousel divs
Therefore, the first 2 carousel divs functioned as set, however, the last moved faster     


# Hide previous and next buttons until pcard is hovered onto

- Let prev and next buttons remain hidden in the main header carousel

# make the pcard a flex container - image, left, text, right 

- In flexpcard
    Have a heading, some text and call to action button or sth

 # modify the create account log in and sign in section   


# after logging in

A system 
Each user with their own account
I suggest using wordpress for now - try
If user creates an account, create a similar but personalized account
Admins should have priviledges 




# Sign up and Login
To login
-Use the username and passowrd set during sign in - 
This means it should be stored somewhere we can access it

-If no username or passowrd set, use default, admin and password to login

//Now how do we store username and password so as to retrieve it later for use in login?



 
 # 7-10-2024
 # Two tabs for the login/sign up page 

 -One tab, student, other staff

 -completed for login

 # Redesign sign in page to reflect that of the login page.


# 11/10/2024
reg-form bug 001
Tabs script does not hide one of the tabcontents 

Solved - add "display: none;" to tabcontents,
 and open a tab by default;

 
12/10
<!--Disable right click context menu for images security-->

How can we uplodad results for parents?


12/10/2024
Profiles updated 

13/10/2024
upload Joining the staff form



# create this
//JobApplication PHP 


# registration box media query for 400px and below corrected

25/10/2024 - Updates
# When a profile is clicked,  it should appear as a dialog box showing extra information.

# Before moving, have a goal
# Without a goal you wander aimlesslessly

# GOAL - Repair the carousel in the mentorship page
Bug: 
It a script in the main js file "script.js" interferes with the running of this script;

Solution
-Move the script to another separate file - "mentorship.js"
-Adjust the script in accordance to W3Schools recommendations


:Status - Completed
- Works locally
-Not functional on the server.



# reduce font-size for input elements in the job application form for smaller devices <400

# Afternoon Updates
The Job Application form

- Padding-left of .5pc added for inputs and option values and placeholders
- Font-size change - media query for varying devices
- 
# Updates 26 oct 2024
- Border radius for most elements in landing and about us page

- changes in design for login page esp the create acc button and also border radius effects

- Google sign in API installation
--- Credentials created at console.cloud.google.com/api/credentials

- Client ID set up for portal-login.php
----googleSignIn.js created and attached to portal-login.php


--  Portal login for staff is not Javascript enabled
Idea
--Use the same script used for learners, but change the classes and id's


// Completed

Now the students and the staff can log in using separate channels

# 4TH NOVEMBER 2024
# SEARCH ALGORITHM FOR CPS WEBSITE

//The function of the search engine is to provide relevant search results
based on the user's search criteria;

For this to function as intended, the engine must have access to multiple resource materials, 
and multiple probable search keywords
//The general format of the algorith is:

if(probable keyword matches available predefined relevant results) {
    return relevant result;
}

//Notice ; we need relevant keyword matches
for example: Say fee structure

A user may search for 'Fee Structure' using the following keywords:
fee, f, fii, school fees, school money, structure, pesa, money, amount, school amount, total, pay

The above are all possible search keywords

The next step is to define what should be returned;

Obviously, the first result is the fee structure;

However, we could also provide relevant results such as:
how to pay, where to pay, school account numbers, who to pay, boarding services, precautions, etc

Basically that is how it will work

Indexing means that we need to list all possible search items AVAILABLE in the website;keyword - available
However we may provide an option to search on the web;
using this :
window.open('https://www/google.com/search?client=firefox-b-d&q=searchVal', '_blank');


# 12 NOVEMBER 2024

Create a registration module for online application 


# NEW FEATURE - 12 NOV 2024 - DIALOG OR MODAL BOX FOR BROKEN LINKS AND BUTTONS
When a user clicks a broken link or button, aquick dialog box will appear
Not working for now


# OBJECTIVE 13 NOV 2024
I think its best we handle all issues - add functionality to the landing page before we proceed to other pages

1. Search Functionality
Objective

when a word is searched, it should list all the available important links on a new search page

Task No.1: Design a search page - Use AccountsPlaceKenya for mockup


13/nov/2024
//Christmass / Holiday changes - a few images added


- Working on feedback.php for sending messages to email


### START IF
## START OPTIMIZATION FOR VERSION 1.1.A
# DATE 7/12/2024

# Changes on the CPS WEBSITE, as from today, 7th DEC 2024, will be done from this endpoint.

# Initial change - Search functionality
- The search functionality is inherited from C:\Users\denis\desktop\code\buildingprojects\cpssearch dir
NB: Functionality functions as intended in the original dir

NB: Search function integrated successfuly and working as intended!



# Second change - When a staff clicks their 'space', a dialog box appears with additional information.



# Indicate the contents of each js file attached on every file, esp the landing page


# Enter marks page
Page added - 

# 18-DEC -2024 // CHANGES
-Profile images in cpsmarksystem page html changed

## ################################## MAJOR UPDATE  ################

# UPLOAD SECTION
- When upload button is clicked, the main app is hidden, and a section with mutliple upload options is displayed;

----Functions as expected;

## REGISTRATION CONNECTED TO DATABASE
username is the unique determiner - primary key

- Can be modified to email

## LOGIN FUNCTIONALITY WORKING
---User data is retrieved from db to recognize user!
Great Achievement!!!!! - 18-12-2024!!!

--User can reset password, but must remember email used during registration 

The email may be used to receive the reset token link, but since I faced a problem with the mail servers, I am displaying the it on the page - not secure.

# DASHBOARD  - 

Dashboard template - may be tuned to meet specific user needs

--Logout capability intalled 

## Note
Find a way to dynamically change the profile of user too.

## #####  ============END OF TODAY'S SESSION --------

## 19 - 12 -2024
 
Files added:
reset_password.php
savestudentsettings.php
settings.php
studentrecords.php
studentsresgister.php
reset.php
loggerout.php
update_password.php
delet_row.php



Files changed
cpsmarkssystem.php
cpsdashboard.html

AS AT 14:23 - 19-12-2024, 

A user can:
Register - data is stored in a database

Login: Data is retrieved from a database

Reset password
Change password.

Change preferences in dashboard.

In CPSMARKSSYSTEM

Register student - STORES DATA IN A DB

Show records stored in the db

## ---AS AT THIS MOMENT - EVERY FILE WORKS AS INTENDED - AND THERE ARE NO ERRORS WHATSOEVER

## CHNAGES ON PRACTICEFIVECPS DIR

After deleting a record, the page redirects to studentsrecords.php page 

Rectified;

LOGOUT BTN on cpsmarksystem.php functionality added 
-It links to the logger.php to log out session - however, there is no login directed to this page- 

Again: It should be set that students, when the login, they will not access some information, accessed by teachers;

Basicaly, teachers and students should have different dashboards.

A learner's dashboard may consist of simple functions such as 
checking and uploading assignments;
checking and downloading exams/notes.past papers, etc

Teacher, 
Register student - esp the senior teacher
Or Basicaly each teacher should have specify the class they are the class teacher, and they will have functionality for that class;
Such as Uploding marks, exams, marking students in, and much more;

Check finances
Check uploaded assignments, and homeworks
check student details-information - including phone numbers
and much more

## Uploading image is not working


Rectified

uploads directory added/ -NOTE

Error was in form definition;
##  ############ VERY IMPORTANT @2222222222222222222222

## HANDLING UPLOADS

Apparently the attribute :
enctype="mutlipart/form-data" must be embedded in the form opening tags for any upload to take place!

# Update the records table to reflect changes in profile uploads

#### ############################## IMPORTANT  CHANGE @@@@@@@@@@@

One id must be used for the entire database, as the primary key if I want an easy time;

This means, the teachers and students will have different tables

However, for now, the username is set as the primary key;
It can remain the same, however, the user as they enter data, they should be requested for regno or staffid, whatever is suitable for each;

## STUDENT'S REGNO column name CHANGED to username;

This means we will receive the regno, but the database will store it in the username column, and will be referenced as such;

-- Plcaholders in forms changed;


## studentsrecords.php 
was heavily relying on the registration number
All the regno names have been changed to username


## NOTE BETTER ========================================
NB: regno or staffid are being inputted, but it is being used as the user's username

## ISSUE 

Currently, there is a users table, and students table;

I do not think this is right;

The intended users of the system - are 
1. Teachers
2. Students
3. Subordinate staff

During registration - we get the main info, that is
firstname, lastname, regno or staffid, and password

But in the system, there is a way to register a student afresh.

=====================================================
## REMOVE REGISTRATION FUNCTION 


Ama - what if we eliminate the need to register

So that the student or teachers are put into the system by an admin - IT admin

I think this is better, because the school is a controlled setting;

If it were a website being used by so many users, then the idea above would not be feasible;

## $$$$$$$$$$$$$$$$$$$

So, we need to include an area to register teachers;

So teachers, or students, or subordinate staff, when they get hired, their info taken in hardcopies will be used to create an account for them - so that they get a school email, and a password they can change later if they so wish;



### %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

Therefore, the cpsmarkssystem.php will serve very important functions and will be accessed only byt the administrators and IT department.


## ==========================================================================





## SYSTEM NAME AS OF 21-12-2023
basealpha



## LATEST VERSION OF consolata website Upload on 21-12-2-23 0337am -cps ictlab

https://consolataschoolnyeri.org/templates/bsalphaone/

Connection to webhost database successfull;

Settings for db configuration located in './wp-config.php' file in server root dir

https://www.inmotionhosting.com/support/edu/cpanel/reset-database-password/


# 22nd DEC 2024 - HOMe - IN MY CRIB


## CHANGES AS FROM 28TH DEC 2024
Registration function removed

If a student clicks register, should be notified to visit the admin or IT

Students will be registered by senior teacher or IT department, or anyone with access to the registration panel

During registration, the above personell will create an account with a default registration number and a password; 

The student may change the password later


## Details taken from new student
id - auto
registration number - username in db
stream or class
entrymarks
healthstatus
profileimg
gender
dateofbirth
feebalance
parentphone
language
status
nationality
password
confirmpass

16 rows

## BUG XXCCCSS

Adjust the resgister container to autofit new additions

Student data can now be entered successfully into the database!

Changes made in cpsmarkssystem.php and studentsregister.php to reflect the same;


-- Login should check students table and not users

In fact, delete users table


## The login - should check the username, and check if the username is that of a student or a teacher, and redirect accordingly;

//So we have to define, how do I know that this is a username of a student?

We have two login in platforms, that of students and that of teachers, and each is processed differently

This means students have their own table and teachers or staff their own table

That of students have already been defined, 

Now what data do we need from the staff:


CREATE TABLE `teachers` (
  `staffid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dateofbirth` datetime DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `basicpay` decimal(19,4) DEFAULT 0.0000,
  `department` varchar(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nextofkin` varchar(255) DEFAULT NULL,
  `remedialallocation` varchar(255) DEFAULT NULL,
  `maritalstatus` varchar(255) DEFAULT NULL,
  `yearofemployment` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `nhifno` varchar(255) DEFAULT NULL,
  `nssfno` varchar(255) DEFAULT NULL,
  `tscno` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `bankaccno` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confpassword` varchar(255) DEFAULT NULL

);


There should be a html table to help IT and secretary to add staff

## STAFF REGISTRATION PANEL COMPLETE
02-JAN-2024
The panel can NOW be used by IT and secretary to add new teachers 
Data is successfully uploaded to database;

staffid and password may be used to login staff to their predefined dashboard;

Update functionality is currently absent;

## ADD A BUTTON FOR TEACHERS RECORDS OR ALTERNATIVELY CREATE TABS FOR EACH - The latter is recommended;


## STUDENT DASHBOARD V1 COMPLETE

## TEACHER'S DASHBOARD IN PROGRESS

staffrecords.php created to handle staff records

delete_staff.php added to handle editing functions

delete_student.php edited -regno changed to username

# NOTES TABLE 

NOTES TABLE TO contain the following fields
1. notesid
2. filename
3. dateuploaded
4. deadline
5. teacher
6. instructions


# ASSIGNMENTS TABLE

Assignments TABLE TO contain the following fields
1. assignmentid
2. filename
3. dateuploaded
4. deadline
5. teacher
6. instructions


# PAST PAPERS 
Past papers TABLE TO contain the following fields
1. pastpaperid
2. filename
3. dateuploaded
4. grade
5. year
6. teacher
7. instructions


## FORCE REFRESH - CTRL +F5
Changes in css and Javascript may not reflect immediately as the browser uses the cached styles and scripts - However, to view immediate changes, press Ctrl + F5 to force refresh and see the updated version.



## 3rd jan 2024 -10:44pm

stafflogin.php and studentlogin.php created



The number of variables must match the number of parameters in the prepared statement 

The number of elements in the type definition string must match the number of bind variables 


## bug setsssxxx
It seems img displayed is the same for all users - php does not pick the uploaded image


## AS AT 4TH JAN 2024
A teacher may upload and view the following:
Announcements
Exams/past papers
assignment
Notes

NB:Discussion capability not enabled;


## MAJOR UPDATE

4TH JAN 2024

examresults.html page created 
This will be used to search and display results based on student class, exam type, year, etc;

However for this to happen

Data will be obtained from the already registered students;

NOTE, we are assuming all students are already enrolled in the students table, thus, from this table, we create a query, i.e, anytime the search button is clicked, a new query is performed, requesting data for the specified students;

Before that, we need to have marks for students - which means we need a way to input them

When a teacher wants to enter marks, they will click a grade;
Once clicked, a query will be created, requesting for all students in the specified class and stream;

NOTE, the students table has all the data of a student needed, and so, the query will return the student's assessment no., full name, and for each, create a table with all subjects, with inputs fields where the teacher can enter marks for each student;


new file 
entermarks.htm - we start as htm them php

This file will enable teachers to click on a certain grade, and stream, and a table is generated for them with input fields to fill marks for their students;



Not working:

Fatal error: Uncaught mysqli_sql_exception: No data supplied for parameters in prepared statement in C:\xampp\htdocs\bsalphathree\exresults.php:26 Stack trace: #0 C:\xampp\htdocs\bsalphathree\exresults.php(26): mysqli_stmt->execute() #1 {main} thrown in C:\xampp\htdocs\bsalphathree\exresults.php on line 26

Currently the php returns all the records in the database, and creates inputs for all the students in the db;

This can be used, however, if we have a school of a thousand students, it would be very difficult to keep looking for a student of a specific grade and stream;

Thus, the script has to select students whose grade and stream is passed when the button is clicked;

So, the script kinda picks students who matches the criteria passed, and returns their name, and asssess. no.

Thus, create a script that takes the inputs grade and stream, and use them as criteria for which the db is searched for students who fit the same;


Completed;

The teacher can now search their students by their grade and stream and fill their marks;

Next, how do we upload the marks to db when save btn is clicked?

# Solution one
Enclose the table in a form;

Perfect idea!

One prob though, how do we upload the username, assess no. and name 

Using a form causes an error!


## LEAVE EXAMS RESULTS FOR NOW

Issue - 
A teacher can now get students from their grade and stream and fill marks for them;

However, we do not have a way to upload these marks;

Issue 2
The uploaded items include
assess no.
name
stream - not required
all subjects--

Now, we may save these in a 'grades' table

that will have the following fields;
assess no - primary key
name
stream
all subject names


However, to display marks, the following items are required;
grade
stream
year
term eg 1st term
level -eg opener

Now, where should these be? a new table? in in grades table

# solution A
we may provide a way to input the year, term and level for every student

so that when getting results from table, we create a query where the above fields will be used as parameters;

But this is tedious;

I want a teacher to select year, select exam term eg 
and exam level/type eg opener, then use the  grade and stream query to get students from the specific class


# Solution b
Using the grades, stream, year, term, and level filter function,
use it as an input - i.e
when button is clicked, it should check whether there is an input with all these parameters, if not, save in the grades table
the grades table will therefore have the following fields:
assess no.
name
stream
grade
year
term
type/level
all subjnames

so that, when btn is clicked, the year, term, grade and stream are saved - saying if they do not exist already, save, 

And then, very key - generates a table with assess no, name, with students of grade x and stream y - where x and y rep any;

## 6TH JAN 2024 = 0542hrs
Modifying e-learning section
So that each grade shows specific exams, notes, or assignments for their grade


## Remove action buttons for students/parents

The action buttons deletes and edits the files, -we do not want a student deleting an assignment once they have downloaded theirs do we?


In the exams tab, create two tabs 
one - for showing available past papers
Two - provides a link to view (parents and students) or enter marks (teachers)

# ENTER MARKS LINK
For teachers - Include it in the teacher's dashboard

# Create a link in the students dashboard redirecting to each of these grades 

teachers too

# Exams section tabs status complete

# E-LEARNING CENTER
The original version of the e-learning is for students and parents

# Option
Use this template and append it in teacher's dashboard - modify to increase priviledges - eg modify files

# Option 2
Take fragments of the e-learning and append them to teacher's dashboard-
e.g enter marks

I think option one is best as it provides the teacher with a comprehensive platform to modify whatever is required;


# ENTERING MARKS SYSTEM

Must be in teacher's dashboard;



Before working on exresults - work on a previous bug

## STAFF DASHBOARD
# PROFILE IMG UPDATE ERROR IN DASHBOARDS

It seems the code does not get the img of each user that is logged in, 

Code now works perfectly and as intended; Profile pictures are updated dynamically


# Assignments, exams, etc 
I think these should have the staff id of the one who uploaded either of these

This will help in displaying uploaded work only for the logged in staff

Right now, the code displays all uploaded work, which is great yes, but not relevant

Anyway, provide a way to view all assignments on a different page


GOING BACK TO RESULTS

Currently the system allows for this function:

If user wants to enter marks, they will go to 'entermarks.php'
Here, they will select grade and stream

This will go to the students table - get the students who match the grade and stream passed
return them and create a table for the subjects the student is taking  -should be like this - but creates a table for all subjects;

Now - Say user enters marks, how is this data record in the db

Do we create another table
What fields will it have?

# examresults.html 
It selects students of grade and stream specified

Creates a table for each, containing input fields to enter marks

A save button when clicked sends data to savemarks.php

It saves marks to the passed username

//error

this is not happening

# savemarks.php 
for processing
 
error - invalid request

The network - request section shows that the data is sent, but it seems this file does not process it - that is - put it into db



## 9TH JAN 2024

MOVING TO bsalphafour


# #-----------------------

Adding php to staffdashboard.php so that the staff or student info is retrieved from the database dynamically based on the logged in user.

Add class field in staff - 

## Bug xxx
When grade student is clicked on cpsmarksystem.php, the page opens both the grading box and the register staff


# bug yyy
Records appear both - for students and staff, but when either of the buttons is clicked, the error is no longer thrown


# 9TH JAN 2024
As of 9th, the information - profile infor for staff changes dynamically when the user logs in;

Include user preferences - 

# User profile picture update status: complete

A user may now update their current profileimg

# Configure subject enrollment for staff

So staff may register subjects they teach
These subjects will be used to help them upload assignments, exams, etc

later
They can be used to create a personal timetable

# Subject registration
-- subject registration table updated so as to allow teachers to select predefined values

status is updated from the code 

I am having an issue displaying the subjects of the logged in teacher - 

Status - Not working

I have tried to fetch data from the server, but the code that fetches data must be appended together with that that uploads - a huge chunk of code - Its not working still

My idea is to have relationships 

To use the logged in session user id- to retrieve not just jubjects but other information.


## LEARNER DASH 11-01-2024

Profile img retrieve code updated

Profile update code updated

status - working

- on the side tabs - my profile img is updated from the db - same for staff

-- View more option in profile page
How do we go about this?

Basically, the objective is to open to a page that shows all data of the user;
How can this be dynamic - 

So that the href attribute is changed dynamically;


status - working as intended.

# EXPORT CURRENT DATABASE FILES FROM THE myPHPAdmin

status - complete

# creating foreign keys -relationships

when registering units/courses/subjects, the script should check the logged in username, and save the subjects under their id

when retrieving, the script will check the logged user and display their registered subjects


-- This implies we have to begin with the registration process;

wow! it works as intended for learnerdashboard;


update for teachers - 


## Subject registration form has taken a toll on me

-- 13/01/2024

Currently the staff can register subjects - but the date and teacher do not appear on the database

Network panel on browser shows that data has been uploaded though


Student registration occurs as expected, however, only the first subject outputs the correct feedback - of successful registration

Subsequent entries, though entered output a message that - the entry exists 

I think i found why - the logic that outputs that the user or subjectcode already exists, is defined to check whether both exists - it should only check the subject code as that is the primary key and should not be re-registered;

No, the issue persists

## END OF BSALPHAFOUR 
## UPLOADING VERSION TO RUN AS MAIN CPS WEBSITE






# START BSALPHAFIVE


Upload status- complete

Running status - Error opening .php pages


-- style login button to run the entire width;
d
 --- jss changed to js through the replace functionality;

 
 ## --23 JAN 2024
 Change display text on the index file - 

 Note this should be done on a panel - assuming someone else without technical knowledge will be making these changes

 This means we should create such an admin panel

 ---
 


Subjects upload has a bug-
On upload, say one subject - the system returns an OK status - sayng the subject has been added successfuly;

However, what is added into the dtabase is not the subject 

Adding a subsequent subject, adds the subject yes, but the notification is that the code / primary key already exists;

This issue is happening because the form takes several subject values and inserts them as an array -  and the fact that only one or two subjects are uploaded at a time


For these reasons, I think it is best that a subject is registered by itself, until the above program -  for uploading several subjects is well mastered.


---

Status- Single subject upload successful for learners;

Now, display each registered subject on the enrolled subjects div

The class and grade should be dynamic - 

## Bug rtsubjectsreg
including the php file that shows reg subjects, inteferes with js that opens tabs

Even adding the php itself, throws a similar error

The eror was occuring due to an incorrectly inserted ASC keyword

Registered subjects status: Dispayed successfully;

Now, each of the displayed subjects on click, shoud display the html already provided - that is - that shows specific announcements etc for each subject and so on.


I think this will require php. 

# Every user can now access their specific enrolled subjects 

# bug imgupdatexx
After updating the profile img, the page loads to a different page;

Issue solved; An opening < for script was missing;


# Add tabs to register and view registered subjects status;

Installing the script in the main staffdash.js file causes conflict that prevents the script from running.

Running the script from a different file works.

# bug enrollsubj11

The enrolled subjects says there are no subjects in the db yet the registered subjects table shows that there are registered subjects


Check? I am noticing this error when im not connecte to the internet? Could thi be the reason?



# The completed assigments html table should be generated automatically - 

Remove the current one
-Done

Add tabs for available assignments and uploading capability

-Copy from staffdash - the functionality already exists


-Done

However, existing assignments are not displayed.
Could it be because i am not connected to the internet?


--Create a table to receive the std assignments and display uploaded assignments in the last tab

stdassignupload.php created to handle procesing of the students assignments


The table should include the name of the user who uploaded the assignment - 

How

Check if the user is logged in

Take the username from the session variable

bind the username and insert it

# bug tab assigncvx

The assignment tab's style to block does not change - thus it remails none

Solved - The id's in the tabs and in the onclick event handlers of the buttons were different.

-Register subjects and registered table can now be viewed in different tabs - functional

# assignments specificty
A learner should only be shown assignments for their grade;


//Modify the script to only show assignments of the logged in user's grade;

--Get assign

# CPSMARKSSYSTEM
--Let upload success message for files be an alert function; under upload files section;

## JUST A THOUGHT!

Make the entire web site a web application by making everything dynamic

start with our staff section;

Generate the profiles of the staff using php

God, php is amazing for web development!

# our staff
we already have their info;

All that is reguired is to register them all and display their records;

### The examresult.php - 
It receives data from the examresults.html

Now the data recieved should be sent to the database and check whether they exist in the specified table

Is this even possible?

Usually, the form sends form data to store;

This form should get the data to the db, and check this data from an already existing database and return the found information

Note that - the data sent to the db is dynamic - 

In simple words, I want the user to ask some information, through the form and the php script checks whether this data exists in a specified table on the database; - then return it


--the examresult.html is used to get stored data in the db


This means there should be an interface to help upload data into the database

grade, stream, year, term, type


## Change enter marks interface to reflect one that has grade, stream, year, term, type and file

The enter marks interface will be used to upload marks - 
These marks will be viewed by parents -in examresults.html








# KEY / MAJOR UPDATE - 9 FEBRUARY 2024




# ENTERING STUDENTS MARKS

entermarks.php 
On this page, a user will select a grade and stream


examresult.php

On this page, all the learners of the specified grade and stream will be displayed, with areas to enter marks for eh of the learners;


This is one of the most vital operations of this system

Being able to enter marks for a specific grade/class and stream and student


Notice, after all the students are displayed, the other task is to allow the user to enter marks for all the learners at the same time or one learner at a time;


Now, after adding new members, the system is not able to get them, despite having been inserted,

So my guess is that there is an issue with either of the parameter, or with the getting of the results

Solved - There was a problem with value inputs - a mismatch from one file and another


Now the names of the specified grade and stream can be listed, the issue now is entering marks for a specific listed learner - 

Already data can be sent to the db in the grades table, but it sends data for other learners too

Again, delete the learner whose markeds have been entered into the database - 

Deleting from this table should add the learner to another table of learners whose marks have been entered, with an option to edit and delete completely.



# -------------

Each learner's marks can be added separately


# -----
The file can display users in the grades db, 
Marks can be added to the grades db for each user



# hide or delete 

When a users marks have been added, hide or delete the user,

This means there needs to be a button on the display page, that links to the list of users whose marks have already been added;

And obviously the file handling the already added people;




# editmarks.php file added

Edit function is not working as expected

// The edit funtionality isnt working
//This is the error it that is given: 

//{"success":true,"subjmath":null,"subjeng":null,"subjkisw":null,"subjscie":null,"subjscre":null,"subjintscie":null,"subjpretech":null,"subjca":null,"subjagrinu":null}
//It seems the data is not retrievd from the database;



#Now that we have the results - students exam marks in gardes table - link the view exams link to a file displaying student results

You may use the same page function used in entering marks 

i.e allowing the user to first select the grade and stream

or we can have tabs

-2nd option - many php files for each grade and stream will be required;

1st option - two pages only
less work less mistakes


2nd option  - more work more mistakes



- I prefer the first - its easier for the user

The page already exists - examresults.php

Now there is a little pickle  -

The examresults.php file asks the user to select:
Grade, stream, year, term, type

However, our grades table has the following:
username, stdgrade, stream, and subject names


However there exists another table - exams
WIth the following records

examname, dateuploaded, examtr, examtype, examgrade, examfile


Establish a database schema for how a user should enter marks, and how it can be retrieved;





# Student Delete function doesnt work

Wasnt working because the staff and the student functions had the same name


# file deleted
adminpanel.html - replaced by staffsettings.php



# staff settings

A staff may now change background color for:
body, central container, and holdwrap container

And text color for all sections - 

We can even compile an entire theme color change, to avoid too many color changes;

# staff subject registration

remove some subject entry areas and retain just one

like in learners dash - also have tabs showing registered subjects

extra rows removed.

update php and remove arrays processing

Done.

Get records and update in the enrolled subjects div


Done.


# enrolled subject onclick - 
This is  major update

When either of the enrolled subjects is clicked, it should show whether there are any assignments, announcements, etc

This update will be done in the next version of the bsalpha system

BSALPHASIX


# END OF BSALPHAFIVE 
13 FEBRUARY 2023


# BSALPHASIX

## START BSALPHASIX



Add tabs to show registration tab and already registered subjects

# 23 MARCH 2023
Staff can now view registered subjects.


# Learner's assignment upload interface - no styles

- Styles added successfully

# Add padding to staff and Learner upload ass. interface

# 6th APril 2024
The marksform.php and examresults.html

The user selects grade, term, stream, type in examresults.html and they are displayed on marksform.php

Operation dysfunctional.


Solutions
1. First, where is the input; the input determines the output

Are the exam results uploaded, or are they generated by the system;

1. At the basic level, i think they should be uploaded, so that we can clearly define the input parameters;

i.e
Grade, Stream, Year, Term, Type, file


Upload marks - found in the cpsmarkssystem.php


# 9TH APRIL 2024
START OF BSALPHASEVEN

# --------------
On the examresult.php, when a students marks are saved, remove the student from the list.

The student should actually be removed from the grades table and add it to the filled marks table.

entermarks.php will be used by teachers to enter learner marks.

Create another similar interface that will enable parents to see results for their class;

start with class, then later on we can modify a way they will only view marks of their specific learner - eg by searching name or assessment number - unique id


for parents - call it viewmarks.php

CREATED;

The viewmarks.php will get data from the grades table and list them based on the defined criteria

link viewmarks.php to the website links
done;

link the entermarks.php to the cpsmarkssystem.php

# ------
viewlist.php displays the list of grade and stream specified;

However, i have realized - there needs to be a table for junior school, upper primary, and lower primary - because they have different subjects;

Now that means, the script should check the grade, following the following logic;

if(grade =>7 ) {
  store in juniorschool table
  subjects = math, eng, kisw,  int scie, pre-tech,s/s, cre, c/a, agri/nu
}else if(grade =>4 AND <= 6) {
  store in upperpry table
  subjects = math, eng, kisw, scie,s/s, cre, c/a, agri/nu
}else {
  store in lowerpry table
  subjects = math, eng, reading, kisw, kusoma, env, cre, c/a 
}


# -----------
The followinf tables have been created with their corresponding subjects;

juniorgrades
lowergrades
uppergrades


Now edit the script - examresult to cater for these changes;

Notice - it is the table that displays where to fill marks that changes, not the source of the students;


so if grade is 4, a table with grade 4 subjects should be displayed - and so on.

Also, the table for grades 4-6 should save marks to uppergrades, grades 7-9 to juniorgrades and grades 1-3, lowergrades, etc

I think there should be several tables predefined, for each case.


# bug3333 ------------------
I have realized that a user may enter students more than once - it should not happen - if marks of the user exists, the script should notify the user and terminate action immediately.

# bug xxxxx -----------
Also, ensure the script does not save empty rows - every subject should have a value before allowing saving.

# bug yyy ----------
six y students display 
only one student is displayed - instead of two

- all 5y learners are displayed - 


# Update vvvv --------
# RANKING SYSTEM
create a formula to calculate the marks entered and give the total;

then rank the learners from the highest to the lowest;

# 11th april 2024

Media query for staffdashboard.php


Media queries in style.css arranged in order - from 996px to 375px

I would advice you to focus mostly on mobile device layout, as if you need the app to be used, most people will access it from their phones.

So make perfect mobile layouts.

# 12 APRIL 2024
Working on media queries - staff

-- --- request btns

done

---- --Profile img
not yet

----- ---viewmorestaff details

done

--- ----side nave for staff

- Completed

-- ---Under Course work, school work - Have the tabs placed on top instead of at the side

- Completed
# 23rd APRIL 

-- ----Table reduced to smaller size
--complete 
Now work on the design 

Could you use divs for smaller tables?

- Media queries for staffdashboard.php -completed


---== MEDIA QUERIES FOR Learnersdash
- Done

# 24 APRIL
When registering subjects, the primary key is set as the username or staffid, 
Registering the first subject is successful, however, subsequent subjects throw an error - concerning primary key Duplicate entry for pk - 

My thought, use subject code as primary key, username as foreign - i need to understand the difference and use cases though


status change: subjectcode - set to primary key for both staff and student;

-Now, user can register as many subjects as they wish - error fixed;

# ASSIGNMENTS, EXAMS, ETC SPECIFICITY
A question:
If a class five teacher posts an assignment, how do we ensure that only grade five learners see the assignment? 

Theory 1
Get assign, FROM assignments WHERE grade?

That is, you get the assign, posted, from assignments table, where grade is that of the logged in user;


# DELETE FUNCTION
Delete function for students & staff subjects isnt working


# Assignment records
for staff and students is the same; consider changing each to be specific

- Done



# Deleting subjects error
When deleting subjects, the deleting php file read is that of assignments - deleteAssignments.php, instead of deletestdSubjects.php


# Deleting Assignments
Works as intended.

# Student Assignment upload 
Not working
Error - All fields are required, even when all fields are filled;

Reason for the above error;
The staff and learner use the same upload file, however the items uploaded are different; basically, the staff uploads more, - some of which are not uploaded by learner;

Solution- create a specific uploader file for learners;

stdassignupload.php

- done

STudents and staff can upload files successfully

# error sss
Seen in learnerdash > completed assignments - i.e in stdassignrecords.php


Warning
: Undefined array key "Assignmentsfile" in
C:\xampp\htdocs\bsalphaseven\stdassignrecords.php
on line
43


# Warning
I think all assignments should be hosted under one table; So that, all we do is retrieve the specific assignment for teacher or learner;

All uploaded asignments by staff will be stored in the assignments table;

Completed assignments will be uploaded to specific tables, e.g. stdassignments.

# MAJOR UPDATE

# # ============== MARKS FILLING BY STAFF
Filling marks requires the teacher to select:
1. Grade
2. Stream

The php should target the grade and stream, and generate:
1st Form
To select type of exam; opener, mid term, term ii, CAT, KAPSEA, etc
Exam Type = A select button with options - OPener
Term - A select button - term ii
Name - Monitoring/KAPSEA/CAT etc

NEXT

2nd form
To fill out of - total marks per subject
Subj  Out of
Math  100
Eng   70

NEXT

3rd form
To fill rubrics
Subj  Min to  Max  Rubric
Math  25  to  40    ME


4th form
To fill students marks
This form will dispay 1 learner at a time;
1. Naomi Kendai : Assessment No.
  Subject  Grade  Rubric
  Math   
  Eng 
  Kisw


# MAJOR BUG SSS32
Find out how to install Apache latest version for consola4 db


# 26th April 2024
# STAFF SETTINGS

Theme colors

# BSALPASEVEN1.1

Theme changes require a change to a new version

The current theme settings require a user to select randow colors for various parts;

I want to make it easier for them, by having two themes; or several; each theme will have a predefined set of colors;

So all a user needs to do is select a theme, press save and they have a new theme applied;


for this, we have to do away with the previous theme settings;

# theme changes -- 
staffsettings.php modified;
apply_theme.php added.


# 29TH APRIL 2024
A REFLECTION

The main aim of the teachers system is to put in students marks, update them, generate reports in pdf or other formats. 
To perform data analyses including ranking, sorting, selecting sample data etc.

To display these results on the Parent's noticeboard. Thats it. Other functions are secondary.


# THEMES
I was working on themes - This is important;

I would like to use the current theme changing processing to work on complex thematic changing.

E.g currently the user can change colors of select areas. Use this formula to create a way for users to select already created themes;


# Away from themes;

# PRIMARY FUNCTION OF THE DATA BASE!
Put in marks

  I am trying to create a php script for entering lower, upper primaries and junior secondary school exam marks. The problem is, subjects taken in lower prrimary, upper and junior secondary are different. 

Should i have separate tables for entering marks or a single table?

If a single table is used;
When entering data, learners in primary do not take integrated sci for example, can we skip some columns when entering data;

If seperate tables, how do we select whic table marks should be inserted.

which is the best option?

# --- Option decided - One table 
When grade and stream are selected;
if(grade <= 3>) {
  create the html structure for the following subjects: 
}



if(grade =>7 ) {
  create table with
  subjects = math, eng, kisw,  int scie, pre-tech,s/s, cre, c/a, agri/nu
}else if(grade =>4 AND <= 6) {
   create table with 
  subjects = math, eng, kisw, scie,s/s, cre, c/a, agri/nu
}else {
  create table with
  subjects = math, eng, reading, kisw, kusoma, env, cre, c/a 
}


# Now, the subjects are displayed based on the grade;

Next, marks entry

Marks entered are currently stored in the juniorgrades table;

NB: The table has all subjects, but for example, a grade 4 learners marks will not include that of Environmental studies, etc;

=== ===== ===
We have created an if conditional statement in javascript, to check grade and save the respective subjects;

I also think the saving procedure is the same, but can use different savemarks.php files.

# It works!
So currently we can save js marks into the database;

To save marks for lower and upper primary, we need to create savemarks php files specific for them, and also adjust javascript entries under the xhr.send command;


If we have a different savemarks php file for each level, then i think we can also insert marks into different tables;


Currently working on upper pry and realized this - trying...

# Data successfully inserted in uppergrades table for level 4-6 - upper primary

# Lower primary

-- Completed

# Data insertion capability completed successfully!
A user can now enter marks for 
1. Js
2. Upper primary
3. Lower Pry

# ================MAJOR UPDATE COMPLETED ===================================

Updates under version bsalphaseven1.1
-- Theme change start - incomplete
-- savemarksjs.php, savemarkslower.php, savemarksupper.php files created
-- Dynamic Table generation based on grade selected
-- Dynamic marks insertion
-- Js functions change - supports entry of data to different tables: i.e lowergrades, uppergrades, juniorgrades

Basically, the user can select a grade and stream, and they will be given a list of the students from their grade, 
they can enter marks -- 

Needed updates
-- Include total functionality in lower and upper grades - Calc total
 -- Include a way to view:
 1.  Display list of marks from every class; - class lists
 2. Display individual marks - individual marks & position

 -- Generate reports - individual, class, level (e.g grade 4 to 6);

 Insert marks individually - a page for each learner - moving on to next and so on
 -- Include Rubrics - EE,ME,AE,BE

 -- Bug
 --- onclick save, the we get - marks saved successfully, even when there are not marks in the input fields.
 

# GOING ON TO BSALPHASEVEN1.2 - 29TH APRIL 2024

# 30TH APRIL 2024

-- Calculating total marks
Juniorgrades- complete
uppergrades - Complete
lowergrades - Complete

- Now marks can be entered successfully and the tota generated


before working on these ...
-- Provide an option to delete data from a table -marks entered;

Have to view options - 
one for teachers with edit and update capabilities.
Another for parents - read only


== Create displays for: 
- level - e.g 4-6
- class
- individual

For teachers and parents;

# DISPLAY FOR CLASS LIST  - 
COMPLETE
A user can now view marks, after selecting grade and stream;

However the marks are not arranged in any order

- Order - status - done
Marks are arranged from highest to lowest

 - Allow a user to view marks for various capacities as stated before:

 Currently - its per stream

 Also: 
 Can we get mean of class and stream?

 # ===========
 Marks per class - ongoing
 grade 1 - complete
 All grades  - marks display per class and per stream complete.


 If i need to view marks of grade one, all streams, its possibe. If i need a single stream, its possible too.

 Now, 
 # Analysis
 No of students with more than half
 No of students with EE

 rUBRICS ARE missing

 Mean scores

# Generating PDFS
First option - using  - jsPDF
TCPDF - PHP

Do this in the morning - 

# 1st MAY 
- No internet
-- Work on rubrics system

# RUBRICS SYSTEM

# MARKS ENTERING PROCESS - FLOWCHART

SHould be like in a slide - Next - Next - Done;
1. Select:
Exam year
Exam type e.g opener
Exam term e.g. ii, iii
Exam name - optional - e.g monitoring assessment

store in examdetails table

NEXT BTN
2. Select Rubrics System
Provide user with a variety of systems
e.g. System 1,2,3,4,5 
OR 
Enter new system

NEXT BTN

3. Select
Grade 
Stream

4. Enter marks
 - Save marks

Done: - Entering marks process by teacher - done

5. Viewmarks
for teachers
per class - editable
per stream  -editable
per level - (4-6, 7-9) editable

Options like update marks, delete (to trash/permanently), view individual
per individual

View marks
For parents
same as teachers - read only


To create the slide mechanism - we have decided to use a carousel

Installed - running- 
Instead of img - replace with content to be displayed

# SLIDE 1 COMPLETE
User can now enter details of the exam on first slide

However, I would like that when the notification that data is saved, the next button is clicked automatically - taking user to the next step;



Rubrics

Rubrics - interface created - 
Too many subjects and inputs - think of a workaround

# -e.g provide already created rubric systems for user to select from

Create rubric tables for each subject

CREATE TABLE `mathrubrics` (
    `subjectname` varchar(255) NOT NULL,
    `mathfromee` varchar(255) NOT NULL,
    `mathtoee` varchar(255) NOT NULL,
    `mathfromme` varchar(255) NOT NULL,
    `mathtome` varchar(255) NOT NULL,
    `mathfromae` varchar(255) NOT NULL,
    `mathtoae` varchar(255) NOT NULL,
    `mathfrombe` varchar(255) NOT NULL,
    `mathtobe` varchar(255) NOT NULL
    
)

I am thinking of using the following table structure

However, is there need to include subjectname? I mean there is a table for every subject


Can you have a table within a table?


Create a rubrics php for processing;

rubricscenter.php

I think we should create the subjectname - 

We wil use this when data is received for processing -- 

Such that - we can use conditional statements;

if(subjectname === ""Math") {
  insert into mathrubrics
}elseif (subjectname === "eng") {
  insert into engrubrics
  and so on...
}

This means we need to have a select area, where for each subject, the teacher will select the subjectname

# Hold Up!

We do not need an interface form for every subject;

All we need is one form; with the following
select option  with 
- subjectname
- grade
then the previous format follows;

Now the tables are okay - 

in the php processing form, 
if(subjectname === ""Math") {
  insert into mathrubrics
  subjname, grade/class, mathfromee, mathtoee, etc
}elseif (subjectname === "eng") {
  insert into engrubrics
  and so on...
}


However, these implementations will take plac in the next version;

# Version bsalphaseven1.2 updates

View displays for parent including:
- per class
- per stream

New files - 
# Major Update 2
markxer.html - Another major update
This will host a carousel with step by step entering marks procedure
Steps
1. Select grade, stream, term, year, type, of exam for which you want to enter marks
2. Select rubrics or enter rubrics system
3. select grade and stream for which you want to enter marks
4. enter marks - save - 
5. View marks

Step 1 complete
Step 2
Interface - requires we do it in the next update
Tables created in db for every subj


# NEW VERSION

# bsalphaseven1.3


# 2nd MAY 2024
Remove the many subjects interfces - remain with one
under markxer.html

# Rubrics - Done

They new entry interface - requires the following: 



CREATE TABLE `rubrics` (
    `rubricname` varchar(255) NOT NULL,
    `subjectname` varchar(255) NOT NULL,
    `grade` varchar(255) NOT NULL,
    `fromee` varchar(255) NOT NULL,
    `toee` varchar(255) NOT NULL,
    `fromme` varchar(255) NOT NULL,
    `tome` varchar(255) NOT NULL,
    `fromae` varchar(255) NOT NULL,
    `toae` varchar(255) NOT NULL,
    `frombe` varchar(255) NOT NULL,
    `tobe` varchar(255) NOT NULL
)

Infact, this entering of rubrics can be displayed under senior teacher's panel or teacher's settings - 

While entering marks, to give the user an easier time, since there are too may subjects - provide options to select from, i.e rubric one, two, etc;


- NB - In the first slide, the grade is entered, therefore, the next slide should display rubrics of the grade entered in the previous slide, and the third slide should actually require the user to enter the stream and be provided with a list of learners from the grade specified in slide 1, and strem specified in slide 3

However - we can still have grade and strem selected again on slide 3;


# Slide carousel ccomplete
Primary function achieved;

-- Keep the next and previous buttons at bottom of the slide.

With the limited knowledge I have, what i have created is perfect;

However, notice the user should be provided with next like pages - like, when user is done with one page, the next one loads - etc

-- Instead of using a carousel - we can leave the items as they are - remove the carousel functionality - 

When the page loads, the first page will appear, once done, when successfully completed, php should load a js function - hiding the current display and displaying the next, similarly, when completed, it wil be hidden, and the next will be displayed and so on -- If user presses back on the current page, the previous page should be dispayed and the current one hidden.


# LOGGED IN USERS

check login status for those required. If yes, show logged in status, if not, show option to login;


-- Transfer markxer contents under enter marks box in cpsmarkssystem.php 

# 3RD MAY 2024
-- A great day - a perfect day
Before transfer - 
Copy all styles from style.css to markxer.css
Copy all js - 

Basicall have all js and styles under one file

previous btn in markxer.html does not go back
-- bug corrected - improper referencing of argument q, parameter q;


Modifications in prev and next btns

- How do we ensure that: 
move to next page, when save or submit page is clicked on current page;

# important update;
I have moved markxerexdetails.php to markxer.php - and its amazing - I think i should have this done to every file - 
will reduce number of files
 # very important:
 will enable printing feedback to the user, on the host page

- How do we ensure that: 
move to next page, when save or submit page is clicked on current page; --- Pending

user the statement used in the delete scripts - 
if(confirm("Marks Entered Successfully.")) {
  document.getElementById(nextbtn).click();
}

-- not working- i think the php is not accessing the html document -find out how


# edit and delete functions;
-- Work on delete and edit functions for marks entered;

# Delete functions
-- Added
deletedlowergrades.sql - table
deleteduppergrades.sql - table
deletedjuniorgrades.sql - table

# Deletion process
1. select the data in the table, like get it
2. Insert it into trash table
3. Delet it from current table;


bug - conversion of $result to string;


# Assignment deadline

- An assignment should disappear when the deadline reaches.

## -- INCLUDE RUBRICS - 
This system without an efficient rubrics system will never see the light of day. Work on it!

# ELECTRON - DESKTOP APPLICATION GENERATOR
I just met electron.

This knowledge is the beginning of new journey!

--Instead of using dialog boxes to show notifications - try using on document notifications - design them nicely--


# MODIFY THIS TEMPLATE TO SELL NOTES, INCLUDE MPESA PAYMENT API, EXAMS, PAST PAPERS, ETC

# 4RD MAY 2024



# DELETE FUNCTION WORKS 
For grade 1 - complete

Marks are removed from the current table and send to the deleted*grades table

Use this as a template for all other grades==

Grade 2 - Done

## Remember to include a path to trash under viewmarks.php

G3 - 

For best use case, use the name not assessment number - eg Marks for Collete deleted.

# Marks deletion successfully completed - 
Grade 1 to 9


# RUBRICS

I have realized that rubrics are featured in almost every document and process  - I think its best we include it right now 

- START - examresults.php

# examresults.php - MAJOR FILE- VERY IMPORTANT!!!!!!!!
Include inputs for rubrics for each subject 

-- Inputs included - 


- Modify - savemarksjs.php, savemarksupper.php, savemarkslower.php

2. 
Modify tables - junior, upper, lower to reflect rubrics for each subject



3. Output and display - reflect rubrics

4. Deleted items.


# INCLUDE OUT OF - 

# iMPORTAT UPDATES  I N BSALPHASEVEN1.3 
- Deletion process
- Carousel - markxer.php - not complete - entering marks step by step



# THE NATURE OF THESE UPDATES REQUIRES THE NEXT VERSION

# BSALPHASEVEN1.4


PHASE 1 AND 2 OF THE RUBRICS - COMPLETE
Users can now enter rubrics and marks successfully;

# - As you calculate mean - also calculate number of EE's, or ME's etc per column

- PHASE 3

# FOCUS OF THE PRIMARY FUNCTION OF THE SYSTEM
1. Entering marks
2. Rubrics system
3. Analysis
4. Report Generation.
 - Design them perfectly but very easy to use, like very.

# ENTERING MARKS
- A page to enter marks - done
- entering marks include:
 - The grade
 - The stream
 - The marks
 - The type of exam - opener -etc
 - year of exam
 - term
 - out of
 - rubrics

 - Can you link these steps? it would be perfect.

- BUG - Marks for one learner can be entered many times - make sure its only one record existing per learner.


Also - Include hints on how to use the system - 
For example - if you enter letters in place of marks, the marks will not be entered - because, the system is calculating the marks - and cannot calculate strings - letters


Like a help page - That leads to an FAQ page - generally asked questions.

# important for apps
Include a back button  - in entermarks pages


# FOCUS IS KEY - INSTAGRAM FOUNDER

CHECK Safaricom Daraja Platform

Very simple and direct to what you need.

Make the cbc system the easiest to use - even a baby can get their way around.

Logged in to daraja
username: denismytin@gmail.com
pass: Verify100%


# PHASE 3 FOR RUBRICS COMPLETE
Now a user can view results, marks and rubrics and total

# PHASE 4
Include rubrics columns in delete tables

Then, i think we should list all deleted items under one roof? like in gmail?

# PHASE 4 Complete

# RUBRICS INPUT COMPLETE
Users can now input, view and delete rubrics.

#  -- -Add back buttons to the enter marks pages
-done

Also - Ensure that only one record exist in the db for each students 

# Access to pages is extremely important aspect for user interface

- cpsmarkssystem should be the center of anything involving students marks
1. Registering learners
2. Entering exam details
3. Entering marks
4. VIewing - Viewing is for three fold

- For teachers
 - It should have edit abiities and acessto dustbin
- Parents
  - Read only
    - Show 
      - Class and Individual
  - Public
    - Like a public noticeboard
      = With like - announcements, newsletters, etc


 # 6TH MAY 2024
Objective:

entermarks.php receives inputs and the marks are saved using savemarksjs.php

bug ---
savemarksjs.php outputs its notifications to the dev tools and not on the user's interface.

Therefore, important notifications are missed by user - 

Work on this - Very important;

Currently: 
The savemarksjs.php can:
- save marks into respective table
- check whether marks already exist
- Check whether all inputs are filled in entermarks.php

Sasa notifications ndio balaa!

# Weka dustbin - 
Include a way to visit the dustbin
under viewmarks.php

This is only accessed by teachers - 

# The RECYCLE BIN


List all the deleted items from all tables, deleted notes, assignments, students, marks, yaani kila kitu

Provide a way to restore;

and to delete permanently;

mODIFY THE DELETE BTN in recyclebin.php to restore data into the table they were deleted from;





# Upload website - make sure php is working on cps domain


# Output from PHP
If you want php output on a separate page - use include(./file.php);


# THURSDAY 9TH 
There was a conflict in js when deleting subjects, assignments, notes - 

- Corrected by using unique function names for each function.

Modify delete processor for subjects, notes, etc so that items when removed from main table are inserted to deleted table


- In learnersdash.php
-hide the sidenav media > 996px;


# bug --
Aouncement display - when an anouncement is available, the upload ann tab is hidden.

# 11th may 2024
# What is the primary function of the system? 
entering marks
displaying and viewing marks

period

work on this and do not deviate from this, until it is perfect.


# db 
You can enter data into columns in the db, and leave others empty

If this is the case;

-- Im thinking of how the entire marks entry process can be from the same table;

If we can have this structure:

STEP 1
grade
stream
year
term
type

STEP TWO
rubricname
subjectname
fromee
toee
fromme
tome
fromae
toae
frombe
tobe

# NB
The save/submit button here, should submit the data above, and then generate the list of students of grade and stream entered;



STEP 3
Display list of students -with areas to enter marks

- -Why are we having all marks data under one table?

How is this data used?


Do we have to use one table? 
Work with the existing tables until it is no longer possible


Include out of for each subject under examresult.php and viewlist.php

OUT OF - 
create a input interface for out of marks for each subject and grade - use the rubrics template

OUT of should only appear in the output - not during the entry of marks under examresult.php

The output should get the out of from the output table



# OUT OF SEEMS TO BE A MASSIVE UPDATE

 Move to next version - bsalphaseven1.5

 # BSALPHASEVEN1.5
 

 ## SYSTEM VERSION AS AT 20/JUNE2024

 Does the system work?
 Can a user:
 1. Register a student? YES - ALICE001009
 2. Enter marks and rubrics for the student? YES - GRADE 9X
 3. View entered marks? YES - GRADE 9X
 4. Edit the marks? NO
 View an analysis of the learner in comparison to the other learners? NO
 5. Delete the marks? NO 
 6. Restore the marks? NO


 # 27/6/2024
 Job description tab has errors - debug

-The form that registers subjects - is resubmitting itself when dashboard is loaded;

-An unknown piece of code in the job description code is causing the other tabs not to appear.

-what is pressing the submit 

# 1 JULY 2024
When staffdashboard.php is changed to a html file, all the tabs work just fine. Under the same server;

Could it be that there is an error in some php code?

## Bug found
Line 805 - Under Announcement section
<?php include 'announcementsrecords.php';?>

But why?

-- Downloading pdf;
Integrate pdf download capability using the dompdf library

tests and works - however- the html file is downloaded automatically on load.

-Best option, when a button is clicked - but any who;

-This means that for every file we want to download, we have to create a html for it. 

Testing with : grade 9 marks

# ---
Step 1: Create another button near back button - 
- href directs to the other gradeninepdf.php file - which is to be generated automatically;

-I foresee a problem- 
This will not be dynamic

# 2 july 2024
# GOOD NEWS!

consolataschoolnyeri.org has been having a bug;

Not openning php files;

I thought it was the version.
but hey, i was wrong

There is a feature under CPanel called the MultiPHPIni - 

Powerful tool there...

So i enabled some features in there and voila! It worked;;

Also i faced a challenge with reading svg code due to the xml tag - then i changed the php.ini tag with this: 

----short_open_tag = Off

and voila! 

So happy-

Now issue 2:

Design sucks - especially colour.

Remember men judge by the appearance. Make it it look professional. or school like.


# 5TH JULY
UPDATE STAFF PROFILES FOR 
TR JOSEPH
TR NJUMA
DIRECTOR
TR ROBERT

Security Guard

# events

karate images uploaded

# laboratory

lab images uploaded.

# 13/7/2024
Put a close button on the Search drop down list - done
script.js updated
styles.css updated
Image two first carousel -on index.html updated
index.html text updated

-aboutcps.html updated
ourstaff.html - updated

-joinform.css - updated
- ourstaff.html

# As at 14/7/24
- Teacher can register learner
- Enter their marks
- View their marks

# =============
db updated - adding rubrics sections
-deletedlower
-deletedjunior
-deletedupper
-juniorgrades
-uppergrades
-lowergrades

--- php updated
-recyclebin.php


---added
-deletedanns
-deletednotes
deletedstaffsubjects
deletedstudentssubjects

- download reg from localhost server
- Update reg db on consola4 server
- 

# ---TESTING for each grade;
 - Adding/registering learner _/
 - Adding marks
 - Deleteting marks

# MOVING TO BSALPHASEVEN1.6

upload reg database to cps server
recyclebin.php
cpsmarkssystem.php

--Can we enter marks for one learner at a time?
Design the interface to be easy to use
check whether all files in localhost are available on the cps server

- to access cpsmarkssystem.php - require login


-- Once marks are entered for a learner, delete or hide the row
- Status - not done

# 17-7-2024
-- Mobile phase for entering marks for junior school complete!
-- PHP Code:

    Each td element now includes a data-label attribute to hold the header text.
    Added <label> elements before each input field for accessibility, which will be hidden on smaller screens.

CSS Code:

    On smaller screens, the data-label attribute value is displayed before each input field using the ::before pseudo-element.
    The label elements are hidden on smaller screens to avoid redundancy, as the data-label provides the same information.
    The padding-left property creates space for the ::before pseudo-element content on smaller screens.

- entermarks
    - Mobile capability complete for all grades;


- PDF Generation?
- Hide a row after it is saved;


# 18- 7- 2024
- make cpsmarkssystem mobile friendly
-status - done

# delete/hide row after marks are entered;

- The examresult.php and savemarksjs.php file

- The notification 
Student with username: " + username + " data saved successfully."

keeps on popping up even when the savemarksjs has an alternative message.

I realized that the message outputted by examresult is just to say that the request and data from the examresult has been sent to savemarksjs for processing. 

That is okay, however, we want messages from the php script thats actually doing the storing of the marks;

Thus, how can we get output from the savemarksjs to appear as an alert on the examresult.php

- # 19/7/2024
Create a html/php file to show marks to parents;

When a button is clicked, say, Grade 1 - It should show a tab with all results for al streams in grade 1. Then, using id's, get to specific stream.

update file paths in index.html to go to viewmarks.html, not php

files  updated
index.html=
alumni.html=
viewmarks.html=
deanacademics.html=
cpsjs.html=
departments.html=
cpscareers.html=
# 22/7/2024
style.css -styles on footer - hover effect on links down there



-- Under directories.php
Indicate that user should login to upload assignments and acess much more!


Transform your registration of students interface to look like that of fliki.ai 

# 24/7/2024 
-Admin SYstem - 1.1
An idea - 
Transform the registration of learners layout i.e cpsmarksystem.php

new version name - adminpanel.html
language - html,js,css,php



- viewmarks.html - media query < 600px

# 26TH JULY 2024

# 29-JULY-2024

# 1 - 08 - 2018
REDESIGN CPSMARKSYSTEM INTERFACE

This is a major update

--btns modified - 
have icons now


- register learner onclick - display dialog box, also teacher

-- rubrica.php and markxer.php transferred to cpsmarksystem.php

# 2ND AUGUST 2024 -
The entermarks form has been moved to cpsmarksystem.php

- On submit, the examresult.php processes the data outputting a table with a list of available learners
- The examresult.php is a big file - Be cautious if you decide to move it under cpsmarkssystem


# 2ND AUG 2024
examresult.php transferred to the cpsmarkssystem.php successfully

# 12/8/2024
The table generated from the db containing list of learners does not display as expected.

# Objective
When the table is generated, the form used to search stream and grade should display none, and the learners list should display;

Can the submit button serve two functions - 
The default sending of data to server, and an added one using js?

so that, when clicked, it searches, and closes the form?

-- Work on sth else for now;

The Admin Panel - Settings of the app?

- Theme 
# 15/08/2024

CPS systems settings page UI set up 10% complete

-- Ensure all colors can be controlled using a few variables under root

- cpsmarkssystem.php

# 23/8/2024
- still working on the printing of pdf results using dompdf 

- Main challenge - The html string which apparently contains of all that is to be printed - its as if it has a problem - because - well the document downloads, but does not open.

- Data under settings page is now dynamic
- User can now change password - under settings
- Instaall ways to notify user in their emails about any change that takes place on their account.

e.g deleting their account;
--Account is deleted, but email not sent;

# 24/08/2024
# # MAJOR UPDATE - REMOVING THE LEARNER WHOSE MARKS HAVE BEEN ENTERED ON RELOAD
Soooooo.. Finally
On the examresult.php
Once a user enters marks, the student whose marks have been entered is removed from display on reload.
Therefore, the teacher will enter marks of all available learners, and every time the marks are saved, the learner disappears. Until none is left; 
This prevents duplication. 

Now, what if I have entered marks incorrectly?

This can only be edited from the view page. By either deleting all the marks, or edititing the wrongly inputted marks;

- We can first allow, complete deletion of the row, so that i reappears under enter marks

- The other option where you can edit every mark, is abit cumbersome for me, but will make the work easier for the user;

 # RESTORE ITEMS FROM RECYCLE BIN

I used the trick in examresult.php to restore marks from various grades; however i had to create a restore point for each grade

How about restoring a staff? and announcement? They both do not have a similar unique id; 

It seems restore points will be different for each category;

The restore button should call a different function, and this function sends the request to the specified php processor file;


e.g announcements will use the unique id -annsname - send to annrestore.php

# Bug - Announcements
When we include the php include statement to show list of ann's. The list appears, but all others, i.e notes, exams, assigments, etc, disappear;

- Bug corrected- The announcement php processer file had a syntax issue with the delete function - 


# -STYLING ASSIGNMENTS, NOTES, ETC
OMG! Looks nice, you should have a look!


# NOW, THE MAIN THING OF THE SYSTEM
- Can the user register learners? Yes
 - Can the user edit / delete learners as needed? 
 Delete - yes; Edit- No
 - Can the user enter marks for a select learner- Yes. The user can select a grade and stream and all the learners in that grade and stream, will appear, i.e if their marks have not already been entered.

 - Can user edit and delete marks?
 Delete- Yes; Edit-No;

 Once deleted, the user many restore from dustbin.


 - Can the user enter rubrics - Main issue!? - Yes
 The user may enter rubrics while entering marks for every subject;

 - Is there a way / an algorithm to determine the overall value of the rubric of a learner's marks?
  - No

  - Can the user view the marks, generate pdfs, share? Well, yes and No
  The user can view marks, but cannot print and share marks as of yet; - 




 # CAN WE CALL THE SYSTEM - LANA? from Learner? Haha!


# Remember that the Learner's dashboard should be consistent with that of the staff - styles, function, etc- Update ASAP


- My GOD!!!! -Check out the studentsrecords display!!!!!! - Its sliiiick!!!
 


# BUGS - JS
Check out portal-login.php for bugs - 

 
# Few functionalities added;
-If dashboard is inactive for five minutes, the user is logged out- by js script;

- If user presses the back button on browser to go back to login page, they are automatically logged out  by a js script- script on portal-login.php page

# Uploading data using Excel - Possible
- Work on it

- Pagination for when entering students marks?



# ALRIGHT - TOO MANY CHANGES - 
MOVING ON TO BSALPHASEVEN1.7

# BSALPHASEVEN1.7 AS OF 25/08/2024 00:32HRS SARTUDAY NIGHT - We open school on Tuesday!


# PDF - ----
It seems the dompdf can only print html pages
, and they must be separate;

- This means, after generating the html content in php, it is sent to a separate file - written to a html file and now we can print this html file.



-- Styling for learners dash


# CURRICULUM DESIGNS
Create table cdesigns
with columns
 designid
 subject
 grade
 dateuploaded
 author


# 27 AUGUST 2024

- First focus on what you have created - ensure it is perfect
Before adding any other functionality

- Styling for learnersdash

- For students - make sure that each student gets specific notes, announcements, exams. 
That is, A student in grade 4, should not see announcements or exams or assignments for another class - 

- Styling for learners - done

- The teacher's assignment uploader should upload to teacher's db, and student's db. So that once the teacher uploads an assignment, they appear both on the teacher's and the student's

The same for students - once the students uploads an assignment, it should appear on the dashboard of the specific teacher that posted that assignment. It shoud also appear on the student's "Completed Assignment section" 

NOTE: The uploaded assignments by students should appear on the teacher's "Completed Assignments"

# 28-8-2024
- So - Now - When the teacher uploads an assignment, it is stored in both the teachers and students databases.
The purpose is to enable both to access the same assignment.

- Also updated - is the deleteAssignments.php 
-If a teacher deletes an assignment, it is deleted even for students. Very important;

- Now - Work on access - 
we said - even if there are a 100 assignments in the student db, a student will only see assignments of their grade. 

-For teachers, all teachers may upload assignments, but a teacher should only view assignments they have posted. 

- Again, when a student uploads an assignment, the php that displays for teachers should only them, those assignments, that they have their name- i think that is the only unique identifier.

# 29/8/2024

- Have a look at this

restaurant-website/
│
├── admin/
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   └── update.php
│
├── public/
│   ├── index.php
│
├── db.php
└── style.css

- All your sites from today on should have such a structure!


# 30 /4/2024
- Now - a student only sees the assignments of their grade;
That is - grade five's will only see grade five assignements.
A guest will see guest assignments

- Now - a teacher should only see assignments they uploaded. Not others uploaded by other teachers. Thats their private business.
for this to happen, i think we need to have the username - so that, assignments uploaded on the db, have the usernames of the teachers who uploaded them, and thus this can be used to retrieve 

even the -stdassignmentrecords.php, also requires the student username, and teacher's staffid- the one who uploaded, so that the assignment will only appear to the student who uploaded the assignment page, and to the teacher who sent the assignment

How can i ensure that the details of the assignment, eg the the teacher's staff id persist, so that even when the student uploads the assignment, it is going to be uploaded for the teacher that uploaded it


stdassignrecords.php - it dsplays the assignments uploaded by teachers

stdassignmentrecords.php should display assignments that the student has uploaded as complete. 
Therefore, this should appear under completed assignments on students and teacher's page. However, you have to install a filter, so that, the completed assignment appears only for the student who uploaded it, and to the teacher who uploaded the assignment, 




# 31/08/2024
- staffid column added to assignments table
- username column added to the beginning of the stdassignments table

- Current staffassignupload.php adds staffid to every assignment, when uploadng it - 
This staffid's function, is to set the display php, ao that a teacher only sees the assignments they have uploaded. - see all assignments, where staffid is mine- sth like that

- Create another table for completedAssignments
- Students will upload completed assignments here. 
- The assignment should have their username - 
- Also, 

- Created 
 -- stdcompletedassigns table
  -- staffcompletedassign table

  -- stdcompletedassignup.php file
   --uploads completed assignments to students and teacher's tables

   # 1/9/2024


- Learnerdash updated  - so that user is welcomed using the first name as registered

- Remember - the assignments, notes, etc section should be populated dynamically when each of the registered subject is clicked;

That is - for example - If math: 5400 has been registered, we will see a custom and specific dynamic items showing announcements, exams, notes and more for that subject;

- Major question - 
A student an assignment and has uploaded it, How can we ensure that only the specific teacher that uploaded it gets the assignment and not any other, since all completed assignments are accessed from one db: staffcompletedassigns: table structure for teachers: 



- new file - stdcompletedrecordsnew.php
- Has a form - 
  - Gets assignments from 'assignments'- and provides a dynamic form to upload the assignment - to completed


- new - 
stdcompletedassignsnew table
assignmentsnew table

both have id's

The id in assignments new is referenced by the id in stdcompletedassignsnew 


has a foreign key that references assignmentsnew id table


Okay - when an assignment appears on the students dashboard, it also has attached, a form that has hidden details of the assignment -
The form only shows an input to upload a file and the submit button. 
Now the essence of this is to make sure that this assignment is tracked by the teacher who gets it - 
How does this occur - Once uploaded - say to stdcompletedassign table, this table has an id that references the original table, where the assignment had been uploaded by the teacher. By haveing a foreign key, the the assignment record in the table in which the teacher uploaded the assignment, and the record in which the student has uploaded the completed ssignment, are linked. Now what??

The goal, is to help the teacher have and know the assignment they uploaded, with all the details, and most importantly the name of the learner. 



# 3/8/2024
Assignment Database schema

## -- UPLOADED ASSIGNMENTS
Assignment process begins when a teacher uploads an assignment - using: 
1. staffassignupload.php

This file uploads the assignment to two tables:
1. assignments / currently- assignmentsnew
NB: assignmentsnew has an id created automatically when  teacher uploads an assignment. Thi id is referenced by the table that hosts completed assignments - uploaded by students.

2. stdassignments

- The assignment is sent to both tables: teacher's records are retrieved from assignmentsnew
while
student's records are retrieved from stdassignments


# COMPLETED ASSIGNMENTS
- stdcompletedassignup.php uploads completed assignment to staffcompletedassigns and stdcompletedassigns





















































































































































































































































Modify it to allow upload of the inputs specified above;

# 9 APRIL 2024

examresult.php displays list of learners specified by grade and stream

-- when marks of a student are filled, save and remove the name from the list.

These adjustments should be made on the php file processing the marks - that is saving the marks - exmresult.php





















































