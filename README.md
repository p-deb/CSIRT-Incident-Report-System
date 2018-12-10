# DBMSFinal

Mini Project: CSIRT Incident Report System  
Lynoska Garcia and Progga Deb  
CSC 263: Database Management Systems  
December 10th, 2018

## ERD Model

![ERD Model](/img/image10.jpg)

## MySQL Workbench Data Model

**Assumptions/Explanations:**

![Data Model](/img/image2.png)

* Each Incident has a type (DOS, Phishing, …), a date created, a status (Open, Closed, Stalled), a title, and an incident number which is auto-incremented
* Each incident can have one to many comments, but each comment can be linked to exactly one incident. These comments will have a timestamp for when they are added and a description containing information regarding the specific incident the comment is linked to. The username of the responder entering the comment will also be linked.
* Each comment can have exactly one Incident Responder associated with it, but an Incident Responder can belong to one or many comments. These Incident Responders have a last name, first name, responder ID, a username and a password.
* An incident can have many participants or IP addresses and a participant or IP address can belong to many incidents. The participants involved in an incident will have a first and last name, a job title, email address and a reason for their association to the incident. If an IP address is given, it will have the specific IP address and the reason for its association the the incident. Both participants and IP addresses will have the incident number they are linked to.

## Sample Data in our Database
Responders are able to insert, update, and delete each component of an incident directly through the database. On the web interface, however, responders may only add and query incidents.

## Our Web Interface:
##### Link: (compsci.adelphi.edu/~proggadeb/DBMSFinal/)

When an user goes to the website (compsci.adelphi.edu/~proggadeb/DBMSFinal/) they will see this login system before they have the ability to see the incidents occurring in the CSIRT System. If the user attempts to bypass the login page, they will be redirected back to it until a correct username and password are submitted.

We have created a general *username*: ```dbms``` and *password* ```fall2018``` for the purposes of this project. We have also created a specific *username* ```xliu``` and *password* ```pwd```.

![Login System](/img/image6.png)

Once the user logs in, they will be redirected to the homepage, where all the incidents are listed in order of most recent to least recent. The incident #, title, type, status and date created are displayed.

![Homepage](/img/image11.png)

If the user wishes to see an incident report, they can click on the search button in the menu and type the incident number they wish to see.

![Search for Incident](/img/image3.png)

Once they click search, they will see the full incident report.

![Incident Report](/img/image8.png)

The user also has the ability to report a new incident by clicking the “Report an Incident” button on the menu. Some of the fields below (ie. Title, Status, Type, and Description) are required fields and the form will not be submitted unless they are filled out.

![New Incident Report](/img/image9.png)

Users creating new incident will have the ability to add as many additional contacts and/or IP addresses as they want.

![Additional Fields](/img/image7.png)

Next, they will specify an incident type (Phishing, Denial of Service, Worm or Virus, Intrusion, and Other). If they choose other, they will be asked to specify.

![Type](/img/image4.png)

Lastly, they will write details about the incident and then submit.

![Description](/img/image5.png)

If the incident submitted is successfully entered into the database, the user will see the following screen and be redirected to the homepage. If they are not redirected, they click on “click here” to manually be taken back to the homepage.

![Successfully Submitted](/img/image1.png)

### Bugs and Limitations:
* When adding multiple participants to a new incident, only the first participant’s information will be recorded. We believe if we made a counter variable that increases as the buttons are pressed, and a loop in the NewIncident.php file could fix this issue.
* If the “Add Contact” or “Add IP Address” button is clicked, once the new fields are populated, they cannot be removed
* If the user searches for an incident number that has not been created, it will give them a blank report
* Duplicate entries will be generated, but the data is only stored in the incident, participant, and participant_has_incident tables. The comments and IP address tables will not accept the duplicate data, therefore displaying empty fields when incident is queried.
* If user logs out, but keeps any of the webpages (ie. Query, Homepage, NewIncident) open, user is still able to make changes and view content without logging in until they leave the website.
