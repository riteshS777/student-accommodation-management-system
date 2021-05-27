# student-accommodation-management-system
In this project I made a student accommodation management system.
Here I have used HTML, CSS, Javascript, Bootstrap, PHP and MySQL for delevoping this project.


Details - In this project one will find a login page, signup page, admin sided pages and student sided pages. This project contains 15 PHP pages, 1 sql database and 4 folders.

Folder details:-
_css folder contains the styles.css file which have all the necessary styling for this project.
_icon folder contails all the icons that have been used in this project.
_image folder contails all the images that have been used in this project.
_includes folder contails the connect.php file that is used for connection with the database named "students_room".

File details:-
admin.php - in this file I have made a admin panel for viewing student details, room details and to insert new room.
change-payment-status.php - in this file I if the admin gets the oaiment from the student then it allocates the room.
checkin.php - in this file code for checkin to a room has been written.
checkout.php - in this file code for checkout of a room has been written.
delete.php - in this file code of delete a room has been written.
index.php - by opening this file one will land in the login page for both admin and student.
insert.php - in this file code for adding room has been written.
logout.php - in this file code for logout of both admin and student has been written.
roomdetails.php - in this file code for showing all the details of the rooms has been written.
sdelete.php & sndelete.php - in these files code for deleting student has been written.
sSignup.php - this file has been used for taking student details and storing in database.
student.php - this file has been used to checkout of a room for a student.
student2.php - this file has been used to checkin to a room for a student.
studentlist.php - is the file where all the activities of the students can be seen by the admin.

Database details:-
students_room.sql - is the datebase that is holding all the necessory tables and dates that are requird to run this project successfully.
  1. admin table - it contains the details of admin
  2. record table - it contains the student email id, room id and payment information
  3. rooms table - it contains the details of room.
  4. students table - it contaisn the all the detailed information of students.

Software requird to run this project:-
1. Xampp server (if not download, then please download and install xampp).
2. Any browser of your choose.

Steps to run this project:-
1. Open xampp server and click on 'Start' for both Apache and MySQL.
2. Then click 'Admin' for MySQL, it will take you to the "phpMyAdmin" panel.
3. Click 'new' form left menu and give the datebase name as "students_room" and click 'create'.
4. Now the database has been created and opened, now click on 'Import' and click "Choose file", now open the downloaded folder named "student-accommodation-management-system" and choose the sql file named "students_room.sql".
5. Now copy the folder "student-accommodation-management-system" into the folder htdocs by goto the Xampp folder. (eg path: E:\Xampp\htdocs)
6. Now open any browser of your choose and paste the link "http://localhost/student-accommodation-management-system/" (NOTE: This link will only be useful if you followed my steps.)
Now you have successfully run my project.
